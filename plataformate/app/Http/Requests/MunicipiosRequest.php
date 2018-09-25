<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipiosRequest extends FormRequest
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
          'correo_rep_1' => 'email|max:299',
          'correo_rep_2' => 'email|max:299',
    			'representante1' =>'string|max:299',
    			'representante2' =>'string|max:299',
    			'rol_rep_1' =>'alpha|max:299',
    			'rol_rep_2' =>'alpha|max:299',
    			'telefono_rep_1' =>'digits:10',
    			'telefono_rep_2' =>'digits:10',
        ];
    }


public function messages()
{
    return [
      'correo_rep_1.email' => 'El correo electrónico no es válido.',
      'correo_rep_1.max' => 'Debes digitar solo 299 carácteres',
      'correo_rep_2.email' => 'El correo electrónico no es válido.',
      'correo_rep_2.max' => 'Debes digitar solo 299 carácteres',
      'representante1.alpha' => 'Debes digitar solo carácteres alfabéticos',
      'representante1.max' => 'Debes digitar solo 299 carácteres',
      'representante2.alpha' => 'Debes digitar solo carácteres alfabéticos',
      'representante2.max' => 'Debes digitar solo 299 carácteres',
      'rol_rep_1.alpha' => 'Debes digitar solo carácteres alfabéticos',
      'rol_rep_1.max' => 'Debes digitar solo 299 carácteres',
      'rol_rep_2.alpha' => 'Debes digitar solo carácteres alfabéticos',
      'rol_rep_2.max' => 'Debes digitar solo 299 carácteres',
      'telefono_rep_1.numeric' => 'Debes digitar solo números',
      'telefono_rep_1.value' => 'Debes digitar solo 10 carácteres',
      'telefono_rep_2.numeric' => 'Debes digitar solo números',
      'telefono_rep_2.value' => 'Debes digitar solo 10 carácteres'
    ];
}



public function attributes()
{
    return [
      'correo_rep_1' => 'correo del representante 1',
      'correo_rep_2' => 'correo del representante 2',
      'representante1' => 'nombre del representante 1',
      'representante2' => 'nombre del representante 2',
      'rol_rep_1' => 'rol del representante 1',
      'rol_rep_2' => 'rol del representante 2',
      'telefono_rep_1' => 'teléfono del representante 1',
      'telefono_rep_2' => 'teléfono del representante 2'

    ];
}

}
