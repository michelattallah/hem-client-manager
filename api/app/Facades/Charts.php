<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Charts extends Facade{

    protected static function getFacadeAccessor(){
        return 'charts';
    } 
}