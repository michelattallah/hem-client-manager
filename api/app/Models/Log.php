<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Log extends Model
{
    protected $fillable = ['service' , 'data','date'];
    protected $casts = [
        'data'  => 'array',
       
    ];
   


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function scopeByDate(Builder $builder , $dates)
	{
        $builder->whereIn('date' , $dates);
	}
    public function scopeByService(Builder $builder , $service)
	{
        $builder->where('service' , $service);
	}

    /* public static function byService($service = null)
    {
        
        if ($service) {
            $logs = self::where('service', $service)->get();
        } else {
            $logs = self::all();
        }


        $allLogs = [];
        
        foreach ($logs as $log) {
            $allLogs[$log->service][] = $log->data;
        }
        return $allLogs;
    } */
}
