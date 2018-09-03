<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{ 	    
		protected $fillable = [
			'ngrupo', 'url', 'resumen', 'representante', 'municipio_id', 'body','correo_representante','telefono_representante', 'representante2','correo_representante2','telefono_representante2',
			'rol','objetivos','nombre_contacto','correo_contacto','telefono_contacto',
			'acta','resolucion','decreto'	
		];

	 protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->photos->each->delete(); 
        });
    }

	public function setMunicipioIdAttribute($municipio)
	{
		$this->attributes['municipio_id'] = Municipio::find($municipio)
							? $municipio
							: Municipio::create(['name' => $municipio])->id;
	}

	//retorna el municipio asosciados a los post
 	 public function municipio()
 	 {
 	 	return $this->belongsTo(Municipio::class);
 	 }
	//retorna las fotos asosciados a los post
 	 public function photos()
 	 {
 	 	return $this->hasMany(Photo::class);
 	 }

    //retorno el nombre del grupo
    public function getRouteKeyName()
    {
    	return 'url';
    }
}
