<?php

namespace Domain\Leiloes;

use Domain\BaseModel;

class Leilao extends BaseModel
{
    protected $table = 'leiloes';
    protected $fillable = ['tipo_leilao_id','usuario_id','vendedor_id','hora_inicio','hora_final','quantidade','status','frete','cep_correio'];
   
   public function tipo_leilao(){
       return $this->belongsTo(\Domain\TiposLeiloes\TipoLeilao::class,'tipo_leilao_id');
   }
   
   public function usuario(){
       return $this->belongsTo(\Domain\Usuarios\Usuario::class);
   }
   
   public function vendedor(){
       return $this->belongsTo(\Domain\Vendedores\Vendedor::class,'vendedor_id');
   }
   
   public function lances(){
       return $this->hasMany(\Domain\Lances\Lance::class,'leilao_id');
   }
   
   public function item(){
       return $this->belongsTo(\Domain\Itens\Item::class,'item_id');
   }
    public function scopeLeilaoAndamento($query,$data){
         return $query->where('hora_inicio','<=',$data)->where('status','=','pendente');        
    }    
}
