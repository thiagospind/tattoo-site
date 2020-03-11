<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $table = 'solicitacao_orcamento';

    public function __get($key)
    {
        if (is_string($this->getAttribute($key))) {
            return mb_strtoupper( $this->getAttribute($key),'UTF-8' );
        } else {
            return $this->getAttribute($key);
        }
    }

    public function __set($key, $value)
    {
        if(is_string($value)){
            $this->attributes[$key] = mb_strtoupper($value,'UTF-8');
        } else {
            $this->attributes[$key] = $value;
        }
    }
}

