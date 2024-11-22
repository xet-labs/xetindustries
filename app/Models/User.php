<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'XI'; 
    protected $table = 'users';
    protected $primaryKey = 'uid';
    
    protected $fillable = [
        'uid', 'username', 'email', 'password', 'name', 'name_l', 'verified', 'role', 
        'created_at', 'updated_at', 'last_login', 'status', 
        'profile_img', 'address', 'phone_no', 'dob', 'config'
    ];

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
    
    // Define relationship 
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'uid', 'uid');
    }
}
