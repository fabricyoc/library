<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'cep',
        'comprovante',
        'referencia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
