<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ReunionController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin')
        {
            $data = Reunion::get()->all();
            return view('reunion.reunion_all',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userStatus = DB::table('user_types')->get();
        $associations = DB::table('associations')->get();
        return view('reunion.reunion_add',compact('userStatus','associations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenu'       => 'required|string|max:255',
        ]);
        try{
            $contenu            = $request->contenu;

            $reunion = new Reunion();
            $reunion->contenu         = $contenu;
            $reunion->save();

            Toastr::success('Rapport ajouter avec succès','Success');
            return redirect()->back();

        }catch(\Exception $e){

            Toastr::error("Erreur d'ajout ",'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role_name=='Admin')
        {
            $data = DB::table('membres')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userStatus = DB::table('user_types')->get();
        $data = Reunion::where('id',$id)->get();
        $userAssociations = DB::table('associations')->get();
        return view('reunion.reunion_edit',compact('data','userStatus','userAssociations'));
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
            $id           = $request->id;
            $contenu      = $request->contenu;
       
        $update = [
            'id'                    => $id,
            'contenu'               => $contenu,
        ];

        Reunion::where('id',$request->id)->update($update);
        $data = Reunion::get()->all();
        $success = Toastr::success('Rapport modifier avec success','Success');
        return view('reunion.reunion_all',compact('data','success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Reunion::find($id);
        $delete->delete();
        Toastr::success('Rapport supprimer avec succès','Success');
        return redirect()->route('reunion.index');
    }
}
