<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ProductsImagesRequest extends Request
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
            'required' => 'Por favor selecione um imagem!',
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
            'image' => 'required|image',
        ];
    }
}
