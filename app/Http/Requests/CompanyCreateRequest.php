<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'type'        => 'required|integer',
            'name'        => 'required|min:4',
            'email'       => 'required|email:filter|unique:Sec_Companies,Email',
            'web_site'    => 'nullable|url',
            'contact_name'=> 'required|min:4',
            'db_name'     => 'required',
            'db_user'     => 'required',
            'db_password' => 'required',
            'max_size_file'        => 'required|integer',
            'max_users'        => 'required|integer',
            'max_disc_space'        => 'required|integer',
        ];
    }
}
