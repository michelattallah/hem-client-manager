<?php

namespace App\Models;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{
    protected $fillable = ['name' , 'description' , 'logo','services'];
    protected $casts = [
        'services' => 'array'
    ];


    public function getClientLogoAttribute()
    {
        return $this->logo;
        
        if(!file_exists($this->logo)){
            return 'https://sommet-education-community.force.com/OLA/resource/1583160931000/OLA/images/lrb-head.png';
        }else{
            return $this->logo;
        }
    }
    
    public function scopeIsActive(Builder $builder)
    {
        return $builder->whereNotNull('name');
    }


    public function logs(){
        return $this->hasMany(Log::class);
    }
    
}
