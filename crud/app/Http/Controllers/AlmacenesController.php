<?php

namespace App\Http\Controllers;

use App\Models\Almacenes;
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
}
