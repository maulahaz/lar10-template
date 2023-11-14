<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use App\Http\Resources\V1\EmployeeResource;
use App\Http\Resources\V1\EmployeeCollection;
use App\Services\V1\EmployeeQuery;

//--Ref: https://www.youtube.com/watch?v=YGqCZjdgJJk

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $filter = new EmployeeQuery();
        $queryItems = $filter->transform($request);//--[['column','operator','value']]

        if(count($queryItems) == 0){
            return new EmployeeCollection(EmployeeModel::paginate());
        }else{
            return new EmployeeCollection(EmployeeModel::where($queryItems)->paginate());
        } 
    }

    //--Original:
    public function index_original()
    {
        //--All Data:
        // return new EmployeeCollection(EmployeeModel::all());
        //--OR, With Pagination:
        return new EmployeeCollection(EmployeeModel::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeModel $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeModel $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeModel $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeModel $employee)
    {
        //
    }
}
