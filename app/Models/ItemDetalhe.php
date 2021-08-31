<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $table = 'produto_detalhes';
    protected $fillable = ['comprimento', 'altura', 'largura', 'unidade_id', 'produto_id'];

    public function produto(){
        //nome da classe, fk da tabela produtos e primary key da tabela produtos_detalhes
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
