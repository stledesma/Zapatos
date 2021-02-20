<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    protected $fillable = [
        'name_shoes', 'size_shoes', 'price_shoes', 'image', 'categoria_id', 'marca_id'
    ];

    public function categoriaZapato(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function marcaZapato(){
        return $this->belongsTo(Marca::class,'marca_id');
    }

    //obtener información del usuario via user_id
    public function autorZapato(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
