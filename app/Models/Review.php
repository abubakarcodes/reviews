<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager',
        'companyId',
        'group1',
        'group2',
        'group3',
        'city1',
        'city2',
        'city3',
        'review',
        'discussion',
        'response',
        'communication',
        'professionalism',
        'expertise',
        'overall',
        'isApproved',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'id');
    }


    public function scopeApproved($query)
    {
        return $query->where('isApproved', 1);
    }
}
