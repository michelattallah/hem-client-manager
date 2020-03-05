<?php

namespace App\Http\Resources\Clients;

use App\Http\Resources\Clients\LogsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Charts;

class ClientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'logo'          => $this->clientLogo,
            'description'   => $this->description,
            'services'      => $this->services,
           /*  'logs'          => Charts::logs($this->logs()->pluck('service' , 'data' , 'date')->toArray()) */
        ];
    }
}
