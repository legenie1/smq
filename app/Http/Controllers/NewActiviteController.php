<?php

namespace App\Http\Controllers;

use App\Models\Activitenew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class NewActiviteController extends Controller
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

        if (Auth::user()->role_name=='Super')
        {
            $data = Activitenew::all();
            return view('activitenew.activite_all',compact('data'));
        }
        if (Auth::user()->role_name=='Admin')
        {
            $data = Activitenew::where('user_id',Auth::user()->id)->get();
            return view('activitenew.activite_all',compact('data'));
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
        $activites = DB::table('activites')->get();
        $userStatus = DB::table('user_types')->get();
        $data2 = DB::table('activites')->get();
        $data3 = DB::table('associations')->get();
        return view('activitenew.activite_add',compact('activites','userStatus','data2','data3'));
    }


    public function paiement()
    {
        $userStatus = DB::table('user_types')->get();
        $data2 = DB::table('activites')->get();
        $data3 = DB::table('associations')->get();
        return view('activitenew.paiement',compact('userStatus','data2','data3'));
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
            'activite'          => 'required|string|max:255',
            'libelle'           => 'required|string|max:255|unique:activitenews',
            'description'       => 'required|string|max:255',
            'montant'           => 'required|string|max:255',
            'status'            => 'required|string|max:255',
        ]);
        

        $new = new Activitenew;
        $new->activite        = $request->activite;
        $new->libelle         = $request->libelle;
        $new->description     = $request->description;
        $new->user_id         = $request->id;
        $new->association_id  = $request->association_id;
        $new->montant         = $request->montant;
        $new->status          = $request->status;
        $new->save();
       
        $data = Activitenew::get()->all();
        $success = Toastr::success('Activité ajouter avec success','Success');
        return view('activitenew.activite_all',compact('data','success'));
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
        if (Auth::user()->role_name=='Super')
        {
            $userStatus = DB::table('user_types')->get();
            $associations = DB::table('associations')->get();
            $data = Activitenew::where('id',$id)->get();
            $activites = DB::table('activites')->get();
        }
        elseif (Auth::user()->role_name=='Admin')
        {
            $userStatus = DB::table('user_types')->get();
            $associations = DB::table('associations')->where('user_id', Auth::user()->id)->get();
            $data = Activitenew::where('id',$id)->get();
            $activites = DB::table('activites')->get();
        }

        return view('activitenew.activite_edit',compact('data','userStatus','activites','associations'));
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
        $activite        = $request->activite;
        $libelle         = $request->libelle;
        $description     = $request->description;
        $association_id  = $request->association_id;
        $montant         = $request->montant;
        $status          = $request->status;
       
        $update = [
            'id'                  => $id,
            'activite'            => $activite,
            'libelle'             => $libelle,
            'description'         => $description,
            'association_id'      => $association_id,
            'montant'             => $montant,
            'status'              => $status,
        ];

        Activitenew::where('id',$request->id)->update($update);
        $data = Activitenew::get();
        $data = Activitenew::get();
        $success = Toastr::success('Activité modifier avec success','Success');
        return redirect()->route('activitenew.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Activitenew::find($id);
        $delete->delete();
        Toastr::success('Activité supprimer avec succès','Success');
        return redirect()->route('activitenew.index');
    }
}
