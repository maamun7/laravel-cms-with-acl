<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UploadLectureVideoRequest extends Request
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
            'video' => 'required|max:1000000|mimes:3gp,mp4'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'video.required' => 'Please select a course name',
            'video.mimes' => 'Upload support only video file',
        ];
    }
}
