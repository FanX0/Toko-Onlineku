<?php

namespace App\Http\Requests\Admin;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'name'=> 'required|string|max:255',
        'email'=> 'required|email|unique:users,email',
        'roles'=> 'nullable|string|in:ADMIN,USER',
        'password'=> 'required|string|min:8',
        'Address_one'=> 'string|max:255',
        'Address_two'=> 'string|max:255',
        'provinces_id'=> 'integer|exists:provinces,id',
        'regencies_id'=> 'integer|exists:regencies,id',
        'zip_code'=> 'integer',
        'country'=> 'string|max:255',
        'phone_number'=> 'string|max:255',
        'store_name'=> 'string|max:255',
        'categories_id'=> 'integer|exists:categories,id',

        ];
    }
}
