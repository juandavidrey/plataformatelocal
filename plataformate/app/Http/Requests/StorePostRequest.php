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
            'nombre_contacto' => 'string|max:190',
            'resumen' => 'max:4999',
            'correo_contacto'=>'email',
            'telefono_contacto'=>'digits:10',
            'ngrupo' => 'required',
            'municipio_id' => 'required',
        ];
    }


public function messages()
{
    return [
      'nombre_contacto.alpha' => 'Digita solo letras.',
      'nombre_contacto.max' => 'Solo se admiten 190 caracteres, escribe el nombre corto',
      'resumen.max' => 'Se admiten 4999 caracteres, recorta el texto',
      'correo_contacto.email'=> 'El correo no es valido',
      'telefono_contacto.digits'=>'Error, digita los 10 numeros del celular',
      'ngrupo.required' => 'El nombre del grupo es requerido',
      'municipio_id.required' => 'Seleccione un municipio',
    ];
}



public function attributes()
{
    return [
        'nombre_contacto' => 'nombre del contacto',
        'resumen' => 'actividades de la organización',
        'correo_contacto' => 'correo del contacto',
        'telefono_contacto'=>'teléfono del contacto'
    ];
}
}
