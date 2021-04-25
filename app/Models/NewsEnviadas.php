<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsEnviadas extends Model
{
    protected $table = 'news_enviadas';

    public function EmailRecebido()
    {
        return $this->belongsTo(Email::class, 'id_email');
    }

}
