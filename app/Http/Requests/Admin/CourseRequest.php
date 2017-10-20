<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CourseRequest extends Request
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
            'course_name'       => 'required|min:3|max:100',
            'price'             => 'required|integer',
            'course_duration'   => 'required',
            'cover_image'       => 'required|mimes:jpg,jpeg,png,gif',
            'total_lecture'     => 'required|integer',
            'meta_title'        => 'required',
            'sort_order'        => 'integer',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            // 'user_type.required' => 'Please enter first name',
            'total_lecture.required' => 'Please enter total number',
            'total_lecture.integer' => 'Please enter a number',
        ];
    }
}
