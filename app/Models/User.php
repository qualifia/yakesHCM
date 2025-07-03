<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔐 Role-checking helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isHcm(): bool
    {
        return $this->role === 'hcm';
    }

    public function isEmployee(): bool
    {
        return $this->role === 'employee';
    }

    public function isBod(): bool
    {
        return $this->role === 'bod';
    }
}
