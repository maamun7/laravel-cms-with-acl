<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LectureRequest extends Request
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
            'course'            => 'required',
            'lecture_name'      => 'required|min:3|max:100',
            'cover_image'       => 'required|mimes:jpg,jpeg,png,gif',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'course.required' => 'Please select a course name',
        ];
    }
}
