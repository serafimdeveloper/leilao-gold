<?php

namespace Domain\Leiloes\Http\Requests;

use Domain\Http\Requests\Request;
use Domain\Leiloes\Leilao;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->route('leiloes');

        return Leilao::where('id', $id)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('leiloes');

        return [

        ];
    }
}
