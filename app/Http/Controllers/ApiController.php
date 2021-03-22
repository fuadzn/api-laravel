<?php

namespace App\Http\Controllers;

use App\Employes;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllEmployes(){
        $employes = Employes::get()->toJson(JSON_PRETTY_PRINT);
        return response($employes, 200);
    }

    public function createEmploye(Request $request){
        $employes = new Employes;
        $employes->name = $request->name;
        $employes->position = $request->position;
        $employes->save();

        return response()->json([
            "message" => "Employes record created"
        ], 201);
    }

    public function getEmploye($id){
        if(Employes::where('id', $id)->exists()) {
            $employes = Employes::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employes, 200);
        } else{
            return response()->json([
                "message" => "Employee Not Found"
            ], 404);
        }
    }

    public function updateEmploye(Request $request, $id) {
        if(Employes::where('id', $id)->exists()) {
            $employes = Employes::find($id);
            $employes->name = is_null($request->name) ? $employes->name : $request->name;
            $employes->position = is_null($request->position) ? $employes->position : $request->position;
            $employes->save();

            return response()->json([
                'message' => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Employee Not Found"
            ], 404);
        }
    }

    public function deleteEmploye($id){
        if(Employes::where('id', $id)->exists()) {
            $employes = Employes::find($id);
            $employes->delete();

            return response()->json([
                "message" => "records deleted successfully"
            ], 202);
        } else {
            return response()->json([
                "message" => "Employes Not Found"
            ], 404);
        }
    }
}
