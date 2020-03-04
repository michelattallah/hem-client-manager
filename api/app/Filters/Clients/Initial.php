<?php
namespace App\Filters\Clients;

use App\Filters\FiltersAbstrcat;
use Illuminate\Http\Request;

class Initial extends FiltersAbstrcat
{

    public static function filter($clients, Request $request){
      
        if( isset($request->letter) && !empty($request->letter) ){ 
       
            $clients = $clients->where('name', 'like' ,  $request->letter.'%');
        }
        return $clients;
    }

}