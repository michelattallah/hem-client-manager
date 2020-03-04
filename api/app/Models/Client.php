<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Client extends Model
{
    
    public function scopeIsActive(Builder $builder){
        return $builder->whereNotNull('name');
    }
}
