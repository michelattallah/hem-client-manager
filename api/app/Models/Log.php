<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['service' , 'data','date'];
    protected $casts = [
        'data'  => 'array',
        'date'  => 'datetime:M Y',
    ];
   


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public static function byService($service = null)
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
    }
}
