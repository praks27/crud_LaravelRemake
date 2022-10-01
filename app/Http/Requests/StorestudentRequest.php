<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorestudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true untuk agar tidak perlu login saat memasukkan data
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //untuk memberikan kondisi data yang masuk ke database
            "name"=>"required|max:50",
            "date_birth"=>"required|date",
            "gender"=>"required|in:male,female",
            "address"=>"required"
        ];
    }
}
