<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = ['nome', 'email', 'senha'];

    public function reviews() {
        return $this->hasMany(
            Review::class,
            'usuario_id',
            'id'
        );
    }
}
