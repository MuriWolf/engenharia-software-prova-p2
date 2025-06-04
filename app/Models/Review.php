<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['nota', 'texto', 'usuario_id', 'livro_id'];

    public function usuario() {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'id'
        );
    }

    public function livro() {
        return $this->belongsTo(
            Livro::class,
            'livro_id',
            'id'
        );
    }
}
