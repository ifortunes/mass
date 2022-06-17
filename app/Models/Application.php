<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'status'
    ];

    public function scopeFiltered($query, $request)
    {
        // TODO Реализовать фильтр

        return $query;
    }
}
