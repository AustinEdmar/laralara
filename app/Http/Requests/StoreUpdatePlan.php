<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // aqui tenho que deixar true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $url = $this->segment(3);
        //
        return [
            // o campo name 'e obrigatorio minimo 3 carater e max 255 e unico na tabela plans
            // onde a url seja igual do plan
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            // nao obrigatorio mas se preencher o min e max
            'description' => 'nullable|min:3|max:255',
            // o regex 'e para pegar valor que tem dos caracteres , e ponto e q o valor 'e numerico
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
