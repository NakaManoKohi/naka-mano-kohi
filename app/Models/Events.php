<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%' )
            ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
}
