<?php

namespace Domain\Compras\Http\Requests;

use Domain\Http\Requests\Request;

class StoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'forma_pagto_id' => 'required|exists:forma_pagtos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'data' => 'required|date|date_format:Y-m-d',
            'hora' => 'required|hora',
            'codigo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'quantidade' => 'required|numeric|max:10',
            'token' => 'required|max:255'
        ];
    }
}
