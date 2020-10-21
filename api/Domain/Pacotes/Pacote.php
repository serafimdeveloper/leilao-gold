<?php

namespace Domain\Pacotes;

use Domain\BaseModel;
class Pacote extends BaseModel
{
    protected $table = 'pacotes';
    protected $fillable = ['plano_pacote_id','nome','descricao','valor','qtd_lances'];
    
    public function plano_pacote()
    {
        return $this->belongsTo(\Domain\PlanoPacotes\PlanoPacote::class,'plano_pacote_id');
    }
}
