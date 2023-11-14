<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientsModel;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{
    public function index()
    {
        // $clients = ClientsModel::paginate(10);
        return ClientsModel::all();

        // return [
        //     "status" => 1,
        //     "data" => $clients
        // ];
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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
 
        $blog = ClientsModel::create($request->all());
        return [
            "status" => 1,
            "data" => $blog
        ];
    }
 
    // public function show($id)
    public function show(ClientsModel $clients)
    {
        return new ClientResource($clients);
        $clients = ClientsModel::find($id);
  
        if (is_null($clients)) {
            return $this->sendError('Data not found.');
        }
   
        // return $this->sendResponse(new ProductResource($clients), 'Data Retrieved Successfully.');

        return [
            "status" => 1,
            "data" =>$clients
        ];
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientsModel  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsModel $blog)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientsModel  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientsModel $blog)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
 
        $blog->update($request->all());
 
        return [
            "status" => 1,
            "data" => $blog,
            "msg" => "ClientsModel updated successfully"
        ];
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientsModel  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientsModel $blog)
    {
        $blog->delete();
        return [
            "status" => 1,
            "data" => $blog,
            "msg" => "ClientsModel deleted successfully"
        ];
    }
}
