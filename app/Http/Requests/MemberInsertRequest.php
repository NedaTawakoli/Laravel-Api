<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberInsertRequest extends FormRequest
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
            "name"=>"required|string|min:3",
            "email"=>["required","string",
            Rule::unique('members','email')->ignore($this->route('member'),'id')
            ],
            "address"=>"required|string",
            "membership_date"=>"required|date",
            "whatsApp_number"=>"nullable|string",
            "status"=>"required|string"
        ];
    }
}
