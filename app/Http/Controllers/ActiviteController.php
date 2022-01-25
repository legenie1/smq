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
        if (Auth::user()->role_name=='Admin')
        {
            $data = Activite::get()->all();
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
        $userStatus = DB::table('user_types')->get();
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
            'association_id'    => 'required|string|max:255',
            'status'       => 'required|string|max:255',
        ]);
        try{
            $libelle            = $request->libelle;
            $association_id     = $request->association_id;
            $status             = $request->status;

            $activite = new Activite();
            $activite->libelle         = $libelle;
            $activite->association_id  = $association_id;
            $activite->status          = $status;
            $activite->save();

            Toastr::success('Activité ajouter avec succès','Success');
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
        $data = Activite::where('id',$id)->get();
        $userAssociations = DB::table('associations')->get();
        return view('activite.activite_edit',compact('data','userStatus','userAssociations'));
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
            $association_id     = $request->association_id;
            $status       = $request->status;
       
        $update = [
            'id'                    => $id,
            'libelle'               => $libelle,
            'association_id'        => $association_id,
            'status'                => $status,
        ];

        Activite::where('id',$request->id)->update($update);
        $data = Activite::get()->all();
        $success = Toastr::success('Activite modifier avec success','Success');
        return view('activite.activite_all',compact('data','success'));
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
