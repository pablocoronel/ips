<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            // crear
            case 'POST':
                return [
                    'username'     => 'required|string|unique:user,username',
                    'nombre'       => 'required|string',
                    'apellido'     => 'required|string',
                    'email'        => 'required|email|unique:user,email',
                    'nacionalidad' => 'required|numeric'
                ];
                break;

            // editar
            case 'PATCH':
                return [
                    'username'     => 'required|string|unique:user,username,' . $this->all()['id'],
                    'nombre'       => 'required|string',
                    'apellido'     => 'required|string',
                    'email'        => 'required|email|unique:user,email,' . $this->all()['id'],
                    'nacionalidad' => 'required|numeric'
                ];
                break;

            default:
                # code...
                break;
        }

    }

}
