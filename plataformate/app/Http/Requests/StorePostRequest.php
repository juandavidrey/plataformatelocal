<?php

 namespace App\Http\Requests;

 use Illuminate\Foundation\Http\FormRequest;

 class StorePostRequest extends FormRequest
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

       public function rules()
    {
        return [
            'nombre_contacto' => 'alpha|max:190',
            'resumen' => 'max:4999',
            'correo_contacto'=>'email',
            'telefono_contacto'=>'digits:10'
        ];
    }


public function messages()
{
    return [
    'nombre_contacto.alpha' => 'Digita solo letras.',
    'nombre_contacto.max' => 'solo se admiten 190 caracteres, escribe el nombre corto',
    'resumen.max' => 'se admiten 4999 caracteres, recorta el texto',
    'correo_contacto.email'=>'el correo no es valido',
    'telefono_contacto.digits'=>'Error, Digita los 10 numeros del celular'

    ];
}



public function attributes()
{
    return [
        'nombre_contacto' => 'nombre del grupo',
        'resumen' => 'Actividades de la organización',
        'correo_contacto' => 'Correo del Contacto',
        'telefono_contacto'=>'Teléfono del contacto'
    ];
}
}
