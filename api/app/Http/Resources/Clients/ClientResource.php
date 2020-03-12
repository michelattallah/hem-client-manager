<?php

namespace App\Http\Resources\Clients;

use App\Http\Resources\Clients\LogsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Charts;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $services = [
            'mautic'         => 'Mautic Leads',
            'sms'            => 'SMS Sent',
            'phone-calls'    => 'Phone Calls',
            /*    'browser-calls'  => 'Browser Calls',
            'email'          => 'Mass Emails', */
        ];

        $dates = ['Jan 2020' ,'Feb 2020' , 'Mar 2020' , 'Apr 2020'];
        $clientLogs =[];
        foreach($services as $service=> $label){
            $logs = $this->logs()->byDate($dates)->byService($service)->get();
            $data = [];
            foreach($logs as $log){
                //$data[$log->date] = $log->data;
                $data[] = $log->data;
            }
            $clientLogs[] = [
                'name' => $label,
                'data' => $data 
            ]; 
            
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'logo'          => $this->clientLogo,
            'description'   => $this->description,
            'services'      => $this->services,
            //'logs'          => Charts::logs($this->id, $logs)
            'logs'          => [
                'series'     => $clientLogs,
                'categories' => $dates,
            ]
            /*'logs'        => Charts::logs(LogsResource::collection($this->logs))
             'logs'         => Charts::logs($this->logs()->pluck('service' , 'data' , 'date')->toArray()) */
        ];
    }
}
