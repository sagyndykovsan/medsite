<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;


    public function scopeFilter($query, array $filters) {
        if ($filters['name'] ?? false) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }
    }
}
