<?php

namespace App\Http\Controllers;

use App\Models\Pac;
use Illuminate\Http\Request;

class PacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pac::get();
        return View('pac.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('pac.create');
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
        $pac = new Pac;
        $pac->input1 = $request->input1;
        $pac->input2 = $request->input2;
        $pac->input3 = $request->input3;
        $pac->input4 = $request->input4;
        $pac->input5 = $request->input5;
        $pac->input6 = $request->input5;
        $pac->input7 = $request->input7;
        $pac->input8 = $request->input8;
        $pac->input9 = $request->input9;
        $pac->input10 = $request->input10;
        $pac->input11 = $request->input11;
        $pac->input12 = $request->input12;
        $pac->input13 = $request->input13;
        $pac->input14 = $request->input14;
        $pac->input15 = $request->input15;
        $pac->input16 = $request->input16;
        $pac->input17 = $request->input17;
        $pac->input18 = $request->input18;
        $pac->input19 = $request->input19;
        $pac->input20 = $request->input20;
        $pac->input21 = $request->input21;
        $pac->input22 = $request->input22;
        $pac->input23 = $request->input23;
        $pac->input24 = $request->input24;
        $pac->input25 = $request->input25;
        $pac->input26 = $request->input26;
        $pac->input27 = $request->input27;
        $pac->input28 = $request->input28;
        $pac->input29 = $request->input29;
        $pac->input30 = $request->input30;
        $pac->input31 = $request->input31;
        $pac->input33 = $request->input33;
        $pac->input33 = $request->input33;
        $pac->input34 = $request->input34;
        $pac->input35 = $request->input35;
        $pac->save();

        return redirect()->route('pac.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function show(pac $pac)
    {
        // pour ajouter un pac
        $pac = new pac;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd($id);
        $data = pac::where('id',$id)->get();
        // dd($data);
        return View('pac.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pac $pac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function destroy(pac $pac)
    {
        //
    }
}
