<?php

namespace App\Http\Controllers;

use App\Fichier;
use Illuminate\Http\Request;

class FichierController extends Controller
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
          $file=Fichier::create([
            'nom'=>$request->nom,
            'auteur'=>$request->auteur,
            'type'=>$request->type,
            'format'=>$request->format,
            'lien'=>$request->lien,
             ]);
         $file->save();
         return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier,$id)
    {
         $file_update=Fichier::findOrFail($id);
         session(['info'=> $file_update]);

         return redirect()->route('file_update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        
         Fichier::findOrFail($id)->update([
            'nom'=>$request->nom,
            'auteur'=>$request->auteur,
            'type'=>$request->type,
            'format'=>$request->format,
            'lien'=>$request->lien,
             ]);
         return redirect()->route('gestion_file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier,$id)
    {
         Fichier::destroy($id);
        return redirect()->route('gestion_file');
    }
}
