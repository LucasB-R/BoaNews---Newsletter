<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'email',
        'password',
        'admin',
    ];

    public function Noticias(){
        return $this->hasMany(Newsletter::class, 'id_usuario')
        ->orderBy('id', 'desc');
    }

    public function Emails(){
        return $this->hasMany(Email::class, 'id_usuario')
        ->orderBy('id', 'desc');
    }
}
