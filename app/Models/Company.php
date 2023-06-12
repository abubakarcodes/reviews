<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];


    public function reviews()
    {
        return $this->hasMany(Review::class, 'companyId', 'id');
    }
}
