<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('username', 'like', '%' . $search . '%' )
            ->orWhere('name', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName(){
        return 'username';
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function followers(){
        return $this->hasMany(Follows::class, 'user_id', 'id')->where('deleted', false);
    }

    public function chat(){
        return $this->hasMany(PublicChat::class);
    }

    public function blog(){
        return $this->hasMany(Blog::class);
    }

    public function event(){
        return $this->hasMany(Events::class);
    }
}
