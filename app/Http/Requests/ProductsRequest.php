<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ProductsRequest extends Request
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
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {
        $messages = [
            'required' => 'Por favor preencha todos os campos, com mais de 5 caracteres, em cada campo.',
        ];

        return $validator->errors()->all($messages);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required',
        ];
    }
}
