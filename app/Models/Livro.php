<?php

namespace App;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';
    protected $fillable = ['titulo', 'sinopse'];

    public function genero() {
        return $this->belongsTo(
            Genero::class,
            'genero_id',
            'id'
        );
    }

    public function autor() {
        return $this->belongsTo(
            Autor::class,
            'autor_id',
            'id'
        );
    }
}
