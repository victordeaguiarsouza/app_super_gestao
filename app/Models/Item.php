<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ItemDetalhe;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        //class do mapeamento, id da fk em ItemDetalhe e primary key da tabela produtos
        return $this->hasOne(ItemDetalhe::class,'produto_id', 'id');
    }
}
