<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'autor',
        'titulo',
        'slug',
        'assunto',
        'dataAquisicao',
        'totLivro',
        'emprestimo',
        'numPropria',
        'imagem',
        'genero',
        'nacionalidade',
    ];

    public function users()
    {
        // Estava utilizando:
        // return $this->belongsToMany(User::class);

        return $this->belongsToMany(User::class)->using(LivroUser::class);
    }
}
