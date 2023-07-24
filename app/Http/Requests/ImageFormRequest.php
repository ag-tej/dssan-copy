<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageFormRequest extends FormRequest
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
        return $this->method() == 'POST' ?
            $this->store() :
            $this->update();
    }

    public function store()
    {
        $rules = [
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,png,jpeg|max:10240'
        ];
        return $rules;
    }

    public function update()
    {
        $rules =  [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'images.*.image' => "",
            'images.required' => "You must use the 'Choose file' button to select which file you wish to upload",
            'images.*.max' => "Maximum file size to upload is 10MB . If you are uploading a photo, try to reduce its resolution to make it under 10MB",
            'images.*.mimes' => "only .jpg, .png and .jpeg files are accepted",
            'image.required' => "You must use the 'Choose file' button to select which file you wish to upload",
        ];
    }
}
