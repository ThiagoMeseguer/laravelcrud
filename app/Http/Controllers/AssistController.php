<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\UpdateAssistRequest;
use App\Models\Assist;
use App\Models\Student;
use Carbon\Carbon;

class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Join para traer la asistencia con los datos del alumno
        //$assists = DB::table('students')->select('students.nombre', 'students.apellido', 'assists.created_at')
        //->join('assists', 'students.id', '=', 'assists.student_id')->get();
        $students = Student::with('assist')->get();
        return view('assists.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dni = $request->input('dni');
        if (!empty($dni)) {
            $students = Student::where('dni', $dni)->get();
            return view('assists.create', compact('students', 'dni'));
        } else {
            //return redirect()->route('assists.create')->with('error', 'Estudiante no encontrado.')->withInput(['dni' => $dni]);
            return view('assists.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssistRequest $request)
    {   
        //"HTTP_REFERER" => "http://127.0.0.1:8000/students"
        // para saber si viene del index o pagina assist
        $index = $request->headers->get('referer');
        $id = $request->input('student_id');
        $student = Student::find($id);
        $today = now()->toDateString();
        // Verifico si tiene asistencia esa fecha, first() trae la primera que encuentra
        $existeAssist = $student->assist()->whereDate('created_at', $today)->first();
        // Si el estudiante ya tiene una asistencia hoy
        if ($existeAssist) {
            if ($index == route('students.index')) {
                return redirect()->route('students.index')->withError('El estudiante ya tiene una asistencia hoy.');
            }
            return redirect()->route('assists.create')->withError('El estudiante ya tiene una asistencia hoy.');
        }

        Assist::create($request->all());
        if ($index == route('students.index')) {
            return redirect()->route('students.index')->withSuccess('Nueva asistencia añadida exitosamente para '.$student->apellido.' '.$student->nombre);
        }
        return redirect()->route('assists.create')
        ->withSuccess('Nueva asistencia añadida exitosamente para '.$student->apellido.' '.$student->nombre);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

        $assists = $student->assist;

        foreach ($assists as $assist) {
            // Transformo la cadena de fecha para eliminar la parte de la zona horaria
            $date = Carbon::parse($assist->created_at);
            $date->locale('es');
            $date = $date->isoFormat('dddd[ ] D [de] MMMM [de] Y');
            $assist->fecha = $date;
        }


        return view('assists.show', [
            'assists' => $assists,
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assist $assist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssistRequest $request, Assist $assist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assist $assist)
    {
        $assist->delete();
        return redirect()->back()->withSuccess('Assist is deleted successfully.');
    }
}
