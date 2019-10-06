<?php

namespace App\Http\Controllers;

use App\ProductoModel;
use Illuminate\Http\Request;
use App\Http\Resources\Producto as ProductoResource;

class ApiProducto extends Controller
{
    public function create(Request $request){
        $producto = new ProductoModel();
        $producto->nombre = trim($request->input('nombre'));
        $producto->cantidad = trim($request->input('cantidad'));
        $producto->precio = trim($request->input('precio'));
        $producto->estado = true;
        
        if(!empty($producto->nombre) && !empty($producto->cantidad) && !empty($producto->precio) && !empty($producto->estado)){
            $producto->save();
            return response()->json(array('msg' => "Created Successfully",
                                    'data' => $producto), 201);
        }else{
            return response()->json(array('error' => "The filds can´t be empty"), 400);
        }
    }

    public function findAll(){
        $producto = ProductoModel::all();
        if($producto){
            return response()->json(array('data' => $producto), 200);
        }else{
            return response()->json(array('msg' => "Not exists records"), 404);
        }
    }

    public function findById($id){
        $producto = ProductoModel::find($id);
        if($producto){
            return response()->json(array('data' => $producto), 200);
        }else{
            return response()->json(array('Error' => "Doesn´t found the record, is posible that no exist the ID ".$id), 404);
        }
    }

    public function update(Request $request, $id){
        if(!empty(trim($id))){
            $producto = ProductoModel::find($id);
            if($producto){
                $producto->nombre = !empty(trim($request->input('nombre'))) ? trim($request->input('nombre')) : $producto->nombre;
                $producto->cantidad = !empty(trim($request->input('cantidad'))) ? trim($request->input('cantidad')) : $producto->cantidad;
                $producto->precio = !empty(trim($request->input('precio'))) ? trim($request->input('precio')) : $producto->precio;
                $producto->estado = !empty(trim($request->input('estado'))) ? trim($request->input('estado')) : $producto->estado;

                if(!empty($producto->nombre) && !empty($producto->cantidad) && !empty($producto->precio) ){
                    $producto->save();
                    return response()->json(array('msg' => "Updated successfully",
                                                    'data' => $producto), 200);
                }else{
                    return response()->json(array('error' => "The filds can´t be empty"), 400);
                }
            }else{
                return response()->json(array('Error' => "The record doesn´t exist"), 400);
            }
        }else{ 
            return response()->json(array('Error' => "ID cant not be empty"), 400);
        }
    }

}
