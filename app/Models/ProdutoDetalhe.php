<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['comprimento', 'altura', 'largura', 'unidade_id', 'produto_id'];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
