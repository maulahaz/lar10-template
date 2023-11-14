<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

//--Ref: https://www.youtube.com/watch?v=Vik6oo4O7xo
//--Ref: https://www.tutsmake.com/laravel-10-rest-api-crud-with-passport-auth-tutorial/

class KaryawanController extends Controller
{

    public function index()
    {
        $employee = EmployeeModel::all();
        // $employee = EmployeeModel::paginate();

        $data = [
            'error'    => false,
            'employee'  => $employee,
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name'      =>'required',
                'phone'     =>'required',
                // 'address'  =>'required',
                // 'username'  =>'required',
            ]
        );

        if($validator->fails()){
            $data = [
                'error'     => true,
                'message'   => $validator->messages(),
            ];
            return response()->json($data, 422);

        }else{
            $emp = new EmployeeModel;
            $emp->name = $request->name;
            $emp->phone = $request->phone;
            $emp->address = $request->address;

            $emp->save();

            $data = [
                'error'     => false,
                'message'   => 'New data has been saved',
            ];
            return response()->json($data, 201);
        }
    }

    public function show($id)
    {
        $employee = new EmployeeModel::find($id);
        if(is_null($employee)){
            $data = [
                'error'     => true,
                'message'   => 'Data not found',
            ];
            return response()->json($data, 404);
        }else{
            return response()->json($employee);
        }
    }

    public function update(Request $request, $id)
    {
        $employee = EmployeeModel::where('id', $id)->exist();
        if(!$employee){
            $data = [
                'error'     => true,
                'message'   => 'Data not found',
            ];
            return response()->json($data, 404);
        }else{
            $emp = new EmployeeModel::find($id);
            $emp->name = $request->name;
            $emp->phone = $request->phone;
            $emp->address = $request->address;

            $emp->save();

            $data = [
                'error'    => false,
                'message'   => 'Data has been updated',
            ];
            return response()->json($data, 200);
        }
    }

    public function destroy($id)
    {
        $employee = EmployeeModel::where('id', $id)->exist();
        if(!$employee){
            $data = [
                'error'     => true,
                'message'   => 'Data not found',
            ];
            return response()->json($data, 404);
        }else{
            $emp = new EmployeeModel::find($id);

            $emp->delete();

            $data = [
                'error'    => false,
                'message'   => 'Data has been deleted',
            ];
            return response()->json($data, 204);
        }
    }

    public function create()
    {
        //
    }

    public function edit(EmployeeModel $employee)
    {
        //
    }    
}
