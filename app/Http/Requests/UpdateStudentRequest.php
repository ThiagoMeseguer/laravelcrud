<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'id' => 'required|numeric|unique:students,id,'.$this->student->id,
                'dni' => 'required|numeric|max-digits:8',
                'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'nacimiento' => 'required',
                'anio' => 'required|max:3'
            ];
    }
}