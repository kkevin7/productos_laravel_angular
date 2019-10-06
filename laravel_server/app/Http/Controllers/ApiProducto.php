<?php

namespace App\Http\Controllers;

use App\ProductoModel;
use Illuminate\Http\Request;
use App\Http\Resources\Producto as ProductoResource;

class ApiProducto extends Controller
{
    public function store(Request $request){
        $producto = new ProductoModel();

        $producto->nombre = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio = $request->input('precio');
        
        $producto->save();
        return new ProductoResource($producto);
    }

    public function show(){
        $producto = ProductoModel::all();
        return ProductoResource::collection($producto);
    }

    public function showById($id){
        $producto = ProductoModel::find($id);
        if($producto){
            return new ProductoResource($producto);
        }else{
            return response()->json(array('Error' => "Doesn´t found the record, is posible that no exist the ID ".$id), 404);
        }
    }



}
