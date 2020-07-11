<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCrearRequest extends FormRequest
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
        return [
            'name'      => 'required|min:4|max:100',
            'last_name' => 'required|min:4|max:100',
            'email'     => 'required|email:filter|unique:Sec_Users,Email',
            'role'      => 'required|integer',
            'password'  => 'required|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Name',
            'last_name' => 'Last Name',
            'email'     => 'Email',
            'role'      => 'Role',
            'password'  => 'Password',
        ];
    }
}
