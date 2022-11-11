<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Events extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $dates = ['date'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%' )
            ->orWhere('body', 'like', '%' . $search . '%');
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
