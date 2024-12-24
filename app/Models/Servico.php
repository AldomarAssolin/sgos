<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'tb_servicos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco'
    ];

    public function ordensServico()
    {
        return $this->hasMany(OrdemServico::class);
    }
}
