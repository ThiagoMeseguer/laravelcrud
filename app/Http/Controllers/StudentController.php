<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Parameter;
use App\Models\Logs;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $students = $this->filters($request);
        $students = $this->condition($students);
        $birthdays = $this->getBirthday($students);
        return view('students.index', ['students' => $students, 'birthdays' => $birthdays]);
    }

    public function filters($request)
    { // Devuelve los estudiantes segun el filtro
        $query = Student::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', $request->input('nombre'));
        }
        if ($request->filled('anio')) {
            $query->where('anio', $request->input('anio'));
        }

        $query->orderby('anio', 'ASC');
        $query->orderby('apellido', 'ASC');
        //$query->orderby('nombre', 'ASC');

        return $query->get();
    }
    public function condition($students)
    {
        $parameters = Parameter::find(1);
        if (!$students == null) {
            foreach ($students as $student) {
                $porcentaje = intval((count($student->assist) / $parameters->cant_dias) * 100);
                if ($porcentaje <= 100) {
                    $student->porcentaje = $porcentaje;
                    if ($porcentaje >= $parameters->promocion) {
                        $student->condicion = "Promoción";
                    } elseif ($porcentaje >= $parameters->regular) {
                        $student->condicion = "Regular";
                    } else {
                        $student->condicion = "Libre";
                    }
                } else {
                    Session::flash('parameters', 'Actualize los parametros (mayores asistencias que los dias de clase)');
                    break;
                }
            }
            return $students;
        }
        return $students;
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->all());
        Logs::setLog("alta");
        return redirect()->route('students.index')
            ->withSuccess('New Student is added successfully.');
    }

    public function show(Student $student): View
    {
        $student = $this->condition([$student]);
        return view('students.show', [
            'student' => $student[0]
        ]);
    }

    public function edit(Student $student): View
    {
        return view('students.edit', [
            'students' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->all());
        Logs::setLog("modificacion");
        return redirect()->back()
            ->withSuccess('Student is updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->assist()->delete();
        $student->delete();
        Logs::setLog("baja");
        return redirect()->route('students.index')
            ->withSuccess('Student is deleted successfully.');
    }

    public function getBirthday($students)
    {
        $birthdays = [];
        if ($students) {
            $hoy = date_format(now(), 'd-m');
            foreach ($students as $student) {
                $fecha = date_format(new DateTime($student->nacimiento), 'd-m');
                if ($hoy == $fecha) {
                    $birthdays[] = $student;
                }
            }
            return $birthdays;
        }
        return $birthdays;
    }
}
