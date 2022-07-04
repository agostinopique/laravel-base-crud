<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|max:50|min:3',
            'image' => 'required',
            'type' => 'required|max:50|min:3'
        ];
    }

    public function messsages()
    {
        return   [
            'title.required' => 'Inserisci il titolo',
            'title.max'=> 'Il titolo deve avere al massimo :max caratteri',
            'title.min'=> 'Il titolo deve avere almeno :min caratteri',
            'image.required' => 'Inserisci l\'image',
            'type.required' => 'Inserisci il tipo',
            'type.max'=> 'Il tipo deve avere al massimo :max caratteri',
            'type.min'=> 'Il tipo deve avere almeno :min caratteri',

        ];
    }
}
