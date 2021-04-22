<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Libros;
use App\Models\Autores;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Instanciem la classe Pokemon
        $autores = new Autores;
        //Declarem el nom amb el request
        $autores->name = $request->name;
        $autores->apellido = $request->apellido;
        $autores->edad = $request->edad;
        $autores->pais = $request->pais;
        //Desem els canvis
        $autores->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //public function show(Pokemon $pokemon)
    {
        //Demanem al model el Pokemon amb  id requerit pele mètode HTTP  GET.
        return Autores::where('id', $id)->get();
        // una altra opció si ens passen per paràmetre Pokemon
        // return $pokemon;*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated_at = date('Y-m-d H:i:s');
        $autores = Autores::find($id);
        $autores->update([
        'name'=>$request->name,
        'apellido'=>$request->apellido,
        'edad'=>$request->edad,
        'pais'=>$request->pais,
        'updated_at'=>$updated_at
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autores::where('id',$id);
        $autor->delete();
    }
}
