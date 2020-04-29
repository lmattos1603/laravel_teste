<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';

    function tipos(){
        return $this->belongsTo('App\Tipo', 'id_tipo', 'id');
    }

    function vendas(){
        return $this->belongsToMany('App\Venda', 'produtos_vendas', 'id_produto', 'id_venda')->withPivot(['id', 'quantidade', 'subtotal'])->withTimestamps();
    }
}
