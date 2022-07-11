<?php

namespace App\Http\Controllers;

use App\Models\Processus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class ProcessusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Processus::get();
        $data = Processus::get();
        return View('processus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('processus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'   => 'required|string|max:255|unique:processuses'
        ]);

        try {
            $processus = new Processus;
            $processus->nom  = $request->nom;
            $processus->save();

            Toastr::success('Processus créer avec succès','Success');
            return redirect()->route('processus.index');

        } catch (Exception $e) {
            Toastr::error('Erreur de création','Error');
            return redirect()->route('processus.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Processus  $processus
     * @return \Illuminate\Http\Response
     */
    public function show(Processus $processus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Processus  $processus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Processus::where('id',$id);
        // return View('processus.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Processus  $processus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Processus $processus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Processus  $processus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $data = Processus::find($id);
            $data->delete();
            Toastr::success('Processus supprimer avec succès :)','success');
            return redirect()->route('processus.index');
    }

}
