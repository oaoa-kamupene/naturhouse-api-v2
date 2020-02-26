<?php


namespace Naturhouse\Entities;


class BaseEntity
{

    public function toArray(){
        $arr = (array) $this;
        $res = [];
        foreach($arr as $key=>$item){
            if($item !== null) {
                $res[trim(str_replace('*','',$key))] = $item;
            }
        }
        return $res;
    }

}