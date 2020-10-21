<?php
/**
 * @Author: Leandro Henrique Reis <emtudo@gmail.com>
 * @Date:   2016-05-05 08:41:02
 * @Last Modified by:   Leandro Henrique Reis
 * @Last Modified time: 2016-06-04 19:51:56
 */

namespace Domain\Especificacaoes\Http\Requests;

use Domain\Categorias\Categoria;
use Domain\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->route('especificacoe');

        return Categoria::where('id', $id)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('especificacoe');

        return [
            'nome' => 'required|max:40',
            'descricao' => 'max:65535',
            'categoria_id' => 'required'
        ];
    }
}
