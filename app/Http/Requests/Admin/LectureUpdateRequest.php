<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LectureUpdateRequest extends Request
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

    public function rules()
    {
        return [
            'course'            => 'required',
            'lecture_name'      => 'required|min:3|max:100',
            'cover_image'       => 'mimes:jpg,jpeg,png,gif',
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
