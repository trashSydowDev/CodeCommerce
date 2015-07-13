<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class CartRequest extends Request
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
            'qtd'=>'required'
        ];
    }
}
