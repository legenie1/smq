<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->role_name=='Super')
        // {
        //     $data = Paiement::get();
        //     return view('compte.compte_all',compact('data'));
        // }
        // elseif (Auth::user()->role_name=='Admin')
        // {
        //     $data = Paiement::get()->where('role_name','Membre')->where('association_id',Auth::user()->association_id);
        //     return view('compte.compte_all',compact('data'));
        // }
        // elseif (Auth::user()->role_name=='Membre')
        // {
        //     $data = Paiement::get()->where('role_name','Membre')->where('association_id',Auth::user()->association_id);
        //     return view('compte.compte_all',compact('data'));
        // }



        if (Auth::user()->role_name=='Admin')
        {
            $data = Paiement::get();
            return view('compte.compte_all',compact('data'));
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
        $data2 = DB::table('activites')->get();
        $data3 = DB::table('associations')->get();
        return view('compte.compte_add',compact('userStatus','data2','data3'));
    }


    public function paiement()
    {
        $userStatus = DB::table('user_types')->get();
        $data2 = DB::table('activites')->get();
        $data3 = DB::table('associations')->get();
        return view('compte.paiement',compact('userStatus','data2','data3'));
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
            'nom_id'                => 'required|string|max:255',
            'activite_id'           => 'required|string|max:255',
            'montant'               => 'required|string|max:255',
        ]);
        

        $compte = new Paiement;
        $compte->nom_id        = $request->nom_id;
        $compte->activite_id   = $request->activite_id;
        $compte->montant       = $request->montant;
        // $compte->status         = $request->status;
        $compte->save();
       
        $data = Paiement::get();
        $success = Toastr::success('Paiement declaré avec success','Success');
        return view('compte.compte_all',compact('data','success'));
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
            $data = DB::table('paiements')->where('id',$id)->get();
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
        $data = Paiement::where('id',$id)->get();
        $data2 = DB::table('activites')->get();
        return view('compte.compte_edit',compact('data','data2','userStatus'));
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
        $id             = $request->id;
        $nom_id         = $request->nom_id;
        $activite_id    = $request->activite_id;
        $montant        = $request->montant;
        $status         = $request->status;
       
        $update = [
            'id'                  => $id,
            'nom_id'              => $nom_id,
            'activite_id'         => $activite_id,
            'montant'             => $montant,
            'status'              => $status,
        ];

        Paiement::where('id',$request->id)->update($update);
        $data = Paiement::get();
        $data2 = DB::table('activites')->get();
        $success = Toastr::success('Paiement modifier avec success','Success');
        return view('compte.compte_all',compact('data','data2','success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Paiement::find($id);
        $delete->delete();
        Toastr::success('Paiement supprimer avec succès','Success');
        return redirect()->route('compte.index');
    }
}
