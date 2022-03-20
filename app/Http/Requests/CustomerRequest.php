<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Illuminate\Support\Facades\Auth;;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules(){
        return [
            'dni' => 'required|string|max:45|unique:customers',
            'id_com' =>'required|exists:communes,id_com',
            'id_reg' =>'required|exists:regions,id_reg|exists:communes,id_reg',
            'name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'required|string|max:120|unique:customers',
            'address' => 'string|max:255',
        ];
    }
}
