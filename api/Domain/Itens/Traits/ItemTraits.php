<?php
namespace Domain\Itens\Traits;

trait ItemTraits {
     public function item(){
        $this->morphOne(\Domain\Itens\Item::class,'item');
     }
}
