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
            'name'        => 'required|min:4|max:100',
            'last_name'    => 'required|min:4|max:100',
            'code'    => 'required|min:4|max:20|unique:Sec_Users,Code',
            'email'         => 'required|email:filter|unique:Sec_Users,Email',
            'role'         => 'required|integer',
            'group'         => 'required|array',
            'password'          => 'required|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'Name',
            'last_name'    => 'Last Name',
            'code'    => 'Code',
            'email'         => 'Email',
            'role'         => 'Role',
            'password'  => 'Password',
        ];
    }
}
