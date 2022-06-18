<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:3', 'max:255'],
            'cover' => ['mimes:jpeg,png,jpg,gif'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório e deve ser preenchido',
            'nome.min' => 'O campo nome deve possuir ao menos :min caracteres.',
            'nome.max' => 'O campo nome não pode possuir mais que :max caracteres',
            'cover.mimes' => 'O arquivo de capa precisa estar nas extensões .jpeg, .png, .jpg, ou .gif',
        ];
    }
}
