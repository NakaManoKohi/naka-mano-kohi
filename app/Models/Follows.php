<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;

    public function follows()
    {
        return $this->hasOne(User::class);
    }
}
