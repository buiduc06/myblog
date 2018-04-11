<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreate extends FormRequest
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
            'title' =>'required',
            'summary'=>'required|max:400',
            'avatar' => 'image',
            'content' =>'required',
        ];
    }
    public function messages(){
        return [
            'title.required' =>'vui lòng điền dữ liệu',
            'summary.required' =>'vui lòng điền dữ liệu',
            'summary.max' =>'giới hạn 400 kí tự',
            'avatar.image' =>'vui lòng chọn ảnh đúng định dạng',
            'content.required' =>'vui lòng điền dữ liệu',
        ];
    }
}
