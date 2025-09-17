<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasaDeSemente extends Model
{
      use HasFactory;

    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'casa_de_sementes';

    // Adicione os novos campos aqui
    protected $fillable = [
        'nome',
        'descricao',
        'responsavel',
        'contato',
        'latitude',
        'longitude',
        'aprovado',
        'cultivos_principais', // NOVO
    ];

    // Esta linha é a mágica!
    // Ela converte automaticamente o JSON do banco para um array PHP e vice-versa.
    protected $casts = [
        'cultivos_principais' => 'array',
    ];
}
