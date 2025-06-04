<?php

namespace App\Models;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autor';
    protected $fillable = ['nome', 'data_nascimento', 'biografia'];

    public function livros() {
        return $this->hasMany(
            Livro::class,
            'autor_id',
            'id'
        );
    }
}
