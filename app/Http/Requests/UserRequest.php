<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome'=>'required|string',
            'cpf'=>'required|numeric',
            'placa_carro'=>'required|string',
            'telefone' => 'required|numeric'
        ];
    }

    public function messages()
    {

        return [
            'nome.required'=>'É necessário informar o nome do usuário.',
            'nome.string'=>'Nome do usuário está no formato inválido.',
            'cpf.required'=>'É necessário informar o cpf do usuário.',
            'cpf.numeric'=>'Cpf do usuário está no formato inválido.',
            'placa_carro.required'=>'É necessário informar a placa do carro do usuário.',
            'placa_carro.string'=>'Placa do carro do usuário está no formato inválido.',
            'telefone.required'=>'É necessário informar o telefone do usuário.',
            'telefone.numeric'=>'Telefone do usuário está no formato inválido.'
        ];
    }
}
