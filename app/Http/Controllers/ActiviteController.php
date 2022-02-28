<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ActiviteController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Super')
        {
            $data = Activite::get();
            return view('activite.activite_all',compact('data'));
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
        $userStatus = Activite::get();
        $associations = DB::table('associations')->get();
        return view('activite.activite_add',compact('userStatus','associations'));
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
            'libelle'         => 'required|string|max:255|unique:activites',
            'status'       => 'required|string|max:255',
        ]);
        try{
            $libelle            = $request->libelle;
            $status             = $request->status;

            $activite = new Activite();
            $activite->libelle         = $libelle;
            $activite->status          = $status;
            $activite->save();

            Toastr::success('Activité ajouter avec succès','Success');
            return redirect()->back();

        }catch(\Exception $e){
            Toastr::error("Erreur d'ajout ",'Error');
            return redirect()->route();
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
        $data = Activite::where('id',$id)->get();
        return view('activite.activite_edit',compact('data','userStatus'));
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
            $libelle      = $request->libelle;
            $status       = $request->status;
       
        $update = [
            'id'                    => $id,
            'libelle'               => $libelle,
            'status'                => $status,
        ];

        Activite::where('id',$request->id)->update($update);
        $data = Activite::get()->all();
        $success = Toastr::success('Activite modifier avec success','Success');
        return redirect()->route('activite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Activite::find($id);
        $delete->delete();
        Toastr::success('Activite supprimer avec succès','Success');
        return redirect()->route('activite.index');
    }
}
