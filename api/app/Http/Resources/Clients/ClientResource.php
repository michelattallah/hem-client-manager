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
        $logs = $this->logs;
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'logo'          => $this->clientLogo,
            'description'   => $this->description,
            'services'      => $this->services,
            'logs'          => Charts::logs( $logs->pluck('date')->toArray(), $logs->toArray())
            /*'logs'        => Charts::logs(LogsResource::collection($this->logs))
             'logs'         => Charts::logs($this->logs()->pluck('service' , 'data' , 'date')->toArray()) */
        ];
    }
}
