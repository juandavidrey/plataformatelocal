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
            'CorreoRep1' => 'email|max:299',
            'CorreoRep2' => 'email|max:299',
			'RepresentanteName1' =>'alpha|max:299',
			'RepresentanteName2' =>'alpha|max:299',
			'RolRep1' =>'alpha|max:299',
			'RolRep2' =>'alpha|max:299',
			'TelefonoRep1' =>'numeric:max:10',
			'TelefonoRep2' =>'numeric:max:10'
        ];
    }


public function messages()
{
    return [
        'CorreoRep1.email' => 'El correo electronico no es valido.',
		'CorreoRep2.email' => 'El correo electronico no es valido.',
		'CorreoRep1.max' => 'Debes Digitar solo 299 Caracteres',
		'CorreoRep2.max' => 'Debes Digitar solo 299 Caracteres',
        'RepresentanteName1.alpha' => 'Debes digitar solo caracteres alfabéticos',
		'RepresentanteName2.alpha' => 'Debes digitar solo caracteres alfabéticos',
		'RepresentanteName1.max' => 'Debes Digitar solo 299 Caracteres',
		'RepresentanteName2.max' => 'Debes Digitar solo 299 Caracteres',
		'RolRep1.alpha' => 'Debes digitar solo caracteres alfabéticos',
		'RolRep2.alpha' => 'Debes digitar solo caracteres alfabéticos',
		'RolRep1.max' => 'Debes Digitar solo 299 Caracteres',
		'RolRep2.max' => 'Debes Digitar solo 299 Caracteres',
		'TelefonoRep1.numeric' => 'Debes Digitar solo números',
		'TelefonoRep2.numeric' => 'Debes Digitar solo números',
		'TelefonoRep1.max' => 'Debes Digitar solo 10 Caracteres',
		'TelefonoRep2.max' => 'Debes Digitar solo 10 Caracteres'

    ];
}



public function attributes()
{
    return [
        'CorreoRep1' => 'Correo del Representante 1',
		'CorreoRep2' => 'Correo del Representante 2',
		'RepresentanteName1' => 'Nombre del Representante 1',
		'RepresentanteName2' => 'Nombre del Representante 2',
		'RolRep1' => 'Rol del Representante 1',
		'RolRep2' => 'Rol del Representante 2',
		'TelefonoRep1' => 'Teléfono del Representante 1',
		'TelefonoRep2' => 'Teléfono del Representante 2'

    ];
}

}
