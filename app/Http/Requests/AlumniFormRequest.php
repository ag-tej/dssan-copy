<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumniFormRequest extends FormRequest
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
            'image' => 'image|max:512',
            'full_name' => 'required',
            'email' => 'required|email|unique:alumnis',
            'address' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:alumnis',
            'social_link' => 'required|active_url|unique:alumnis',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'current_university' => 'required',
            'major_subject' => 'required',
        ];
        if ($this->method() == 'PUT') {
            $rules['email'] = 'required|email|unique:alumnis,email,' . $this->route('alumnus');
            $rules['contact'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:alumnis,contact,' . $this->route('alumnus');
            $rules['social_link'] = 'required|active_url|unique:alumnis,social_link,' . $this->route('alumnus');
        }
        return $rules;
    }
}
