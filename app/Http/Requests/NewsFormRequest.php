<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
            'headline' => 'required',
            'tagline' => 'required',
            'reported_by' => 'required',
            'article' => 'required',
            'release_date' => 'required|date',
        ];
        if ($this->method() == 'PUT') {
            $rules['image'] = 'image|max:512';
        }
        return $rules;
    }
}
