<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(){
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
    }

}
