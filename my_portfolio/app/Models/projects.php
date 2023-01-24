<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model 
{
     use HasFactory;
    protected $fillable = [
        'title',
        'image_url',
        'description',
        'github_repo',
        'techs'
    ];

    public static function create(array $attributes = []){

        $model = static::query()->create($attributes);
        return $model;
    } 

    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%');
        }
    }
}
