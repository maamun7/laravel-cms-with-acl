<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
            'title'         => 'required|min:3|max:100',
            'menu_type'     => 'required',
            'content_type'  => 'required',
            'link'          => 'required',
            'order'         => 'required|integer',
            'published'     => 'required',
        ];
    }
}
