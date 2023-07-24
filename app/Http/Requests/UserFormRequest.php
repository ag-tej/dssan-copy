<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'image' => 'required|image|max:512',
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ];
        if ($this->method() == 'PUT') {
            $rules['image'] = 'image|max:512';
            $rules['email'] = 'required|unique:users,email,' . $this->route('user')->id;
        }
        return $rules;
    }
}
