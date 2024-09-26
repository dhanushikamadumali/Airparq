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
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mail_host' => 'required|string',
            'mail_username' => 'required|string',
            'mail_password' => 'required|string',
            'mail_enc' => 'required|string',
            'mail_port' => 'required|string',
        ];
    }
}
