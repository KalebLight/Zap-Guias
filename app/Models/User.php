<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'cnpj',
        'company_id',
        'company_type',
        'admin'
    ];

    public function company()
    {
        return $this->morphTo();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favoritos()
    {
        return $this->hasMany(FavoritosService::class);
    }

    public function favoritosPartners()
    {
        return $this->hasMany(FavoritosPartner::class);
    }


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->admin;
    }
}
