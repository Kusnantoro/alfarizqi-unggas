<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'LIKE', '%' . $search . '%')
            ->orwhere('no_hp', 'LIKE', '%' . $search . '%')
            ->orwhere('status', 'LIKE', '%' . $search . '%');
        });
    }
}
