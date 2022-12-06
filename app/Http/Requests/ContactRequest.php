<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/admin') {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required | email',
            'postcode' => 'required | regex:/^[0-9]{3}-[0-9]{4}+$/',
            'address' => 'required',
            'building_name' => 'nullable',
            'opinion' => 'required | between:0,150',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '苗字を入力してください',
            'first_name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => 'ハイフンを含めて8文字で入力してください。',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.between' => '120文字以内で入力してください'
        ];
    }
}