<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\Clients\ClientResource;
use App\Http\Resources\Clients\ClientsResource;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $clients = Client::isActive();

       $clients = $this->filter(['initial'] , $clients , $request);
       $clients = $clients->orderBy('created_at' , 'DESC')->paginate($request->limit);

       return ClientsResource::collection($clients);
    }


    /**
     * Filter Clients
     */
    protected function filter($filters = [] , $clients , Request $request){
        foreach ($filters as $filter) {
            $class = "App\\Filters\\Clients\\" . ucwords($filter);
            $clients = $class::filter($clients , $request);
        }
      
        return $clients;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'          => 'required',
            'description'   => 'required',
            'logo'          => 'required',
        ]);
        $client = Client::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'logo'          => $request->logo['path'],
            ]);
        
        return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
