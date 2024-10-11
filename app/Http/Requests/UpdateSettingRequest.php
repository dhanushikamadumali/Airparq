<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'smtp_host' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'enc_type' => 'required|string',
            'port' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|string',
            'phone2' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
