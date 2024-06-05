<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Assist;
class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'dni',
        'nombre',
        'apellido',
        'nacimiento',
        'anio'
    ];

    public function assist(){
        return $this -> hasMany(Assist::class);
    }
}
