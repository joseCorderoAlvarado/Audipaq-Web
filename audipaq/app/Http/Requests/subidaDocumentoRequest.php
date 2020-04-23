<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subidaDocumentoRequest extends FormRequest
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
            'txtIdACta' => 'required'
        ];
		$documento = count($this->input('txtdocumentos'));
        foreach(range(0, $documento) as $index) {
            $rules['documento.' . $index] = 'application|mimes:doc,xls,pdf,ppt|';
        }

        return $rules;
		
    }
}
