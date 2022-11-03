<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function follow() {
        return $this->belongsTo(User::class, 'user_id', 'id')->select('id', 'username');
    }

    public function follower() {
        return $this->belongsTo(User::class, 'followed_by', 'id')->select('id', 'username');
    }
}
