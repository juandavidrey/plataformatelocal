<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //Almacenar los pdf de las PMJ
    protected $fillable = ['titulo','descripcion','url'];

    //retorno el nombre del grupo
    public function getRouteKeyName()
    {
    	return 'name';
    }

    //retorna los post asosciados al municipio
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //retorna los post asosciados a la organizacion
    public function organizaciones()
    {
        return $this->hasMany(Organizaciones::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
