<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email"=>'required|email|min:5',
            'password'=>'required|min:5'
            //
        ];
      
    }
   public function messages() {
       
        return [
            'email.required'=>'Email khong de trong',
            'email.email'=>'email k dung dinh dang',
            'email.min'=>'khong dc nho hon 5 ki tu',
            'password.required'=>'yeu cau nhap',
            'password.min'=>'khong dc nho hon 5 ki tu'

        ];
    }
}
