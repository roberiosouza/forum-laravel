<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
                'subject'=>['required', 'min:3', 'max:255', 'unique:supports'],
                'body'=>['required', 'min:3', 'max:10000'],
        ];

        if ($this->method() === 'PUT')
        {
            $rules['subject'] = [
                'required', 'min:3', 'max:255', Rule::unique('supports')->ignore($this->id)
            ];
        }
        return $rules;
    }

    public function messages() : array
    {
        return [
            'subject.required' => 'O campo Assunto é obrigatório.',
            'subject.min' => 'O campo Assunto deve conter pelo menos 3 caracteres.',
            'subject.max' => 'O campo Assunto deve conter no máximo 255 caracteres.',
            'subject.unique' => 'Já existe um Assunto com essa descrição.',
            'body.required' => 'O campo Decrição deve é obrigatório.',
            'body.min' => 'O campo Decrição deve conter no mínimo 3 caracteres.',
            'body.max' => 'O campo Decrição deve conter no máximo 10.000 caracteres.',
        ];
    }
}
