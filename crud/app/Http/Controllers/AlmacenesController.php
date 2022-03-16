<?php

namespace App\Http\Controllers;

use App\Models\Almacenes;
use App\Models\Productos;
use App\Models\Productos_almacenes;
use Illuminate\Http\Request;

class AlmacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res['almacenes']=Almacenes::paginate(5);
        return view('almacenes.index', $res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = request()->except('_token');
        Almacenes::insert($res);
        return redirect('almacenes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function show(Almacenes $almacenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $almacen=Almacenes::FindOrFail($id);
        return view('almacenes.edit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = request()->except(['_token','_method']);
        Almacenes::where('id','=',$id)->update($res);
        return redirect('almacenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Almacenes::destroy($id);
        return redirect('almacenes');
    }

    public function addProductos($id)
    {
        $almacen=Almacenes::FindOrFail($id);
        $productos=Productos::get();
        $allProductos = Productos_almacenes::join('productos', 'productos.id', '=', 'productos_almacenes.id_productos')
        ->select('productos.name as producto','productos.id as id_productos')
        ->where('productos_almacenes.id_almacenes', $id)
        ->get();
        return view('almacenes.addProductos', compact('almacen','productos', 'allProductos'));
    }

    public function storeProductos(Request $request, $id)
    {
        try{
            $res = request()->except('_token');
            $res['id_almacenes'] = $id;
            Productos_almacenes::insert($res);
            return redirect('/almacenes/'.$id.'/addProductos');
        }catch(\Exception $e){
            return redirect('/almacenes/'.$id.'/addProductos')->withErrors(['msg' => 'El producto ya esta en el almacen.']);
        }
    }

    public function destroyProductos($almacen,$producto)
    {
        Productos_almacenes::where('id_almacenes', $almacen)
        ->where('id_productos', $producto)
        ->delete();
        return redirect('/almacenes/'.$almacen.'/addProductos');
    }
}
