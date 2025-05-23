<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritosService extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'servico_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
