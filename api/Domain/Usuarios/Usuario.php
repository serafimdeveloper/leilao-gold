<?php

namespace Domain\Usuarios;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey='id';
    protected $fillable = [
        'nome','username','email','password','confirm_token','ativo','usuario_type','usuario_id','remember_token','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function enderecos(){
      return $this->hasMany(\Domain\Enderecos\Endereco::class);
    }
    
    public function contatos(){
      return $this->hasMany(\Domain\Contatos\Contato::class);
    }
    
    public function itens(){
      return $this->hasMany(\Domain\Itens\Item::class,'item_id');
    }
    
    public function compras(){
      return $this->hasMany(\Domain\Compras\Compra::class);
    }
    
    public function leiloes(){
      return $this->hasMany(\Domain\Leiloes\Leilao::class,'leilao_id');
    }
    
    public function lances(){
      return $this->hasMany(\Domain\Lances\Lance::class);
    }

    public function usuario(){
      return $this->morphTo();
    }

    public function vendedores(){
      return $this->hasMany(\Domain\Vendedores\Vendedor::class,'usuario_id');

    }

    public function add_lances($lances){
      return $this->qtd_lances =+ $lances;
    }

    public function remover_lances($lance = 1){
        if($this->qtd_lances > 0){
          return $this->qtd_lances=-$lance;
        }
        return false;
    }
}
