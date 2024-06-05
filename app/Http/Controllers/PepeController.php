<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class PepeController extends Controller
{
    public function conditionStudent($id, Student $student){
        $student = Student::find($id);
        $assists = $student->assist;
        $cantClase = 1;
        $porcentaje = count($assists)/$cantClase*100;
        $porcentaje = number_format($porcentaje, 0);
        //dd($cantClase);
        if ($porcentaje > 100) {
            return $porcentaje.' Mas de 100%';
        }
        if (($porcentaje >= 70 ) && ($porcentaje <= 100)){
            return $porcentaje.' Promociono';
        }elseif ($porcentaje >= 50) {
            return $porcentaje.' Regular';
        }else{
            return $porcentaje.' Libre';
        }
    }
}
