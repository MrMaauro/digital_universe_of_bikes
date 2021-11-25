<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;
use inertia\inertia; 

class CategoriasController extends Controller
{
    
    public function index(Request $request)
    {
        $catprod = categorias::get();
        return Inertia::render('Categorias',['categorias'=>$catprod]);
    }

    public function index2(Request $request)
    {
        $catprod = categorias::get();
        return ['categoria'=>$catprod];
    }   
   
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;
        $reg = categorias::select('id','name')->OrderBy('name','asc')->get();
        return ['catprod'=>$reg];
    }
    
    public function store(Request $request)
    {
        $catpro = new categorias;
        $catpro->name = $request->name;
        $catpro->save();
    }
        

    public function update(Request $request)
    {
        $catpro = categorias::find($request->id);
        $catpro->name = $request->name;
        $catpro->save();
    }

   
    public function destroy(Request $request)
    {
        $catprod = categorias::findOrFail($request->id);
        $catprod->delete();
    }
}
