<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subidaLogotipoRequest extends FormRequest
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
            
        ];
		$logo = count($this->input('txtlogotipo'));
        foreach(range(0, $logo) as $index) {
            $rules['logo.' . $index] = 'image|mimes:png,jpeg,bmp,webp,gif,jpg|';
        }

        return $rules;
		
    }
}
