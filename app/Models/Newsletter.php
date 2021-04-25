<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter';
    protected $fillable = [
        'titulo',
        'noticia',
    ];

    public function Autor(){
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function Noticia()
    {
        return $this->hasMany(NewsEnviadas::class, 'id_noticia');
    }


}
