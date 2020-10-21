<?php
/**
 * Created by PhpStorm.
 * User: DouglasSerafim
 * Date: 09/10/2016
 * Time: 00:14
 */

namespace Domain\PlanoPacotes;


use Domain\BaseModel;

class PlanoPacote extends BaseModel
{
    protected $table = 'plano_pacotes';
    protected $fillable = ['nome','descricao'];

    public function pacotes()
    {
        return $this->hasMany(\Domain\Pacotes\Pacote::class,'plano_pacote_id');
    }


}