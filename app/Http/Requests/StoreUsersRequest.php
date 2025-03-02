<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest



{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'roles' => 'required|in:admin,moderator,user,guest',
            'mobile' => ' required|nullable|numeric|digits_between:10,15',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'لازم تكتب اسم المستخدم',
            'name.min' => 'الاسم لازم يكون على الأقل 3 حروف',
            'name.max' => 'الاسم بقا اكتر من 20 حروف',  
            'email.required' => 'لازم تكتب البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'لازم تكتب كلمة المرور',
            'password.min' => 'كلمة المرور لازم تكون على الأقل 8 حروف أو أرقام',
            'roles.required' => 'يجب تحديد دور المستخدم',
            
            'mobile.numeric' => 'رقم الجوال يجب أن يحتوي على أرقام فقط',
            'mobile.required' => 'رقم الجوال يجب أن يكتب',
            'mobile.digits_between' => 'رقم الجوال يجب أن يكون بين 10 و 15 رقماً',
        ];
    }
}
