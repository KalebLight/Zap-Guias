<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'servicos';

    public function servicos()
    {
        return $this->morphMany(Servico::class, 'empresa');
    }

}
