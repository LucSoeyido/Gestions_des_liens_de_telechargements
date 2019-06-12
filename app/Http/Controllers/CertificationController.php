<?php

namespace App\Http\Controllers;

use App\Certification;
use Illuminate\Http\Request;
use App\Http\Requests\CertificationRequest;
use Illuminate\Support\Facades\Storage;
use Session;

class CertificationController extends Controller
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
    public function store(CertificationRequest $request)
    {
        //$chemin=$request->file('photo');
        $path = Storage::disk('uploads')->putFile('images', $request->file('photo'));
        //Storage::disk('uploads')->storeAs('images', $request->file('photo'),'luc.jpeg');
         /*$path=$request->file('photo');
         $pathstore=$request->file('photo')->storeAs('public','luc');
         */
         $certif=Certification::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'categorie'=>$request->categorie,
            'club'=>$request->club,
            'assurance'=>$request->assurance,
            'sang'=>$request->sang,
            'medical'=>$request->medical,
            'photo'=>$path,
            'tel'=>$request->tel,
            'licence'=>$request->licence,
            'date_valide'=>$request->date_valide
         ]);
         $certif->save();
         return redirect()->route('register');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification,$id)
    {
         $certifinfo=Certification::findOrFail($id);
         session(['number' => $certifinfo]);
         //return view('certif_impression');

        return redirect()->route('certif_impression');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification,$id)
    {
        //
        $certifupdate=Certification::findOrFail($id);

         return view('certif_update',compact('certifupdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification,$id)
    {
        //
         Certification::findOrFail($id)->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'categorie'=>$request->categorie,
            'club'=>$request->club,
            'assurance'=>$request->assurance,
            'sang'=>$request->sang,
            'medical'=>$request->medical,
            'tel'=>$request->tel,
            'licence'=>$request->licence,
            'date_valide'=>$request->date_valide]);
        return redirect()->route('gestion_certif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification,$id)
    {
        //
        Certification::destroy($id);
        return redirect()->route('gestion_certif');
    }
}
