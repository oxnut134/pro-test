<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFirstRequest extends FormRequest
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
            'profile_image' =>  ['required','mimes:jpeg,png,jpg'],//for first_profile
             'user_name' => ['required'],
             'post_code' => ['required','regex:/^\d{3}-\d{4}$/'],
             'address' => ['required'],
             //'building' => ['required'],
        ];
    }
    public function messages()
    {

        return [
            'profile_image.required' => '画像ファイルを入力してください。',
            'profile_image.mimes' => '画像ファイルはjpg,jpeg,pngの型式にしてください。',
            'user_name.required' => 'お名前を入力してください。',
            'post_code.required' => '郵便番号を入力してください。',
            'post_code.regex' => '郵便番号はハイフンありの８文字で入力してください。',
            'address.required' => '住所を入力してください。',
         ];
    }

}
