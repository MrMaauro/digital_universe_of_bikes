<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use inertia\inertia;

class ProductosController extends Controller
{
    //
    public function index(Request $request)
    {
        $reg = productos::join('categorias','productos.id_category','categorias.id')
        ->select('productos.name as productos', 'productos.description', 'categorias.name as categoria')
        ->get();
        return Inertia::render('Productos',['consulta'=>$reg]);
    }

    public function index2(Request $request)
    {
        $reg = productos::join('categoria','productos.id_category','categorias.id')
        ->select('productos.id as id','productos.name as product', 'productos.description', 'productos.price', 'categorias.id as id_categorias', 'categorias.name as category')
        ->get();
        return ['consulta'=>$reg];
    }

    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;
        if($buscar=='')
        {
            $reg = productos::select('id','name','price')
            ->where('state',0)
            ->get();    
        }
        else
        {
            $reg = productos::select('id','name','price')
            ->where('id',$buscar)
            ->get();    
        }
        return ['consulta'=>$reg];
    }

    public function store(Request $request)
    {
        $reg = new productos;
        $reg->name = $request->name;
        $reg->description = $request->description;
        $reg->id_prod_category = $request->id_prod_category;
        $reg->price = $request->price;
        $reg->state = $request->state;
        $reg->picture = $request->picture;
        $reg->save();
    }

    public function update(Request $request)
    {
        $reg = productos::find($request->id);
        $reg->name = $request->name;
        $reg->description = $request->description;
        $reg->id_prod_category = $request->id_prod_category;
        $reg->price = $request->price;
        $reg->state = $request->state;
        $reg->picture = $request->picture;
        $reg->save();
    }  

    public function destroy(Request $request)
    {
        $reg = productos::findOrFail($request->id);
        $reg->delete();
    }
}

