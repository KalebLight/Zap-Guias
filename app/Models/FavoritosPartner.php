<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritosPartner extends Model
{
    use HasFactory;

    protected $table = 'favoritos_partner';
    protected $fillable = ['user_id', 'partner_id', 'partner_type'];

    public function partner()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
