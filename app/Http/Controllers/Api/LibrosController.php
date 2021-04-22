<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Libros;
use App\Models\Autores;

class LibrosController extends Controller
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
        $libros = new Libros;
        //Declarem el nom amb el request
        $libros->titulo = $request->titulo;
        $libros->autor = $request->autor;
        $libros->precio = $request->precio;
        $libros->isbn = $request->isbn;
        $libros->numPag = $request->numPag;

        //Desem els canvis
        $libros->save();

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
        return Libros::where('id', $id)->get();
        // una altra opció si ens passen per paràmetre Pokemon
        // return $pokemon;

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
    public function update(Request $request,$id)
    {
        $updated_at = date('Y-m-d H:i:s');
        $libros = Libros::find($id);
        $libros->update([
        'titulo'=>$request->titulo,
        'autor'=>$request->autor,
        'precio'=>$request->precio,
        'isbn'=>$request->isbn,
        'numPag'=>$request->numPag,
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
        $libro = Libros::where('id',$id);
        $libro->delete();
    }
}
