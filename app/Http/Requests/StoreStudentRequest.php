<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'last_name' => ['required'],
            'first_name' => ['required'],
            'avatar' =>  ['nullable', 'image'],
            'grade_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Last name is required',
            'first_name.required' => 'First name is required',
            'avatar.image' => 'Avatar must be an image',
            'grade_id.required' => 'Grade is required',
        ];
    }
}
