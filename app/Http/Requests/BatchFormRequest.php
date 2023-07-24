<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchFormRequest extends FormRequest
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
            'batch' => 'required|min:13|unique:batches',
            'image' => 'required|image|max:512',
        ];
        if ($this->method() == 'PUT') {
            $rules['batch'] = 'required|min:13|unique:batches,batch,' . $this->route('batch')->id;
            $rules['image'] = 'image|max:512';
        }
        return $rules;
    }
}
