<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
            'event_title' => 'required',
            'description' => 'required',
            'event_date_time' => 'required',
        ];
        if ($this->method() == 'PUT') {
            $rules['image'] = 'image|max:512';
        }
        return $rules;
    }
}
