<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_name=='Admin')
        {
            $data = DB::table('associations')->get();
            return view('association.association_all',compact('data'));
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
        return view('association.association_add',compact('userStatus'));
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
            'libelle'                => 'required|string|max:255|unique:associations',
            'session'                => 'required|string|max:255',
            'start'                  => 'required|string|max:255',
            'end'                    => 'required|string|max:255',
            'status'                 => 'required|string|max:255',
        ]);
        

        $association = new Association;
        $association->libelle        = $request->libelle;
        $association->session        = $request->session;
        $association->start          = $request->start;
        $association->end            = $request->end;
        $association->status         = $request->status;
        $association->save();
       
        $data = DB::table('associations')->get();
        $success = Toastr::success('Association ajouter avec success','Success');
        return view('association.association_all',compact('data'));
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
            $data = DB::table('associations')->where('id',$id)->get();
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
        $data = DB::table('associations')->where('id',$id)->get();
        return view('association.association_edit',compact('data','userStatus'));
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
        $libelle        = $request->libelle;
        $session        = $request->session;
        $start          = $request->start;
        $end            = $request->end;
        $status         = $request->status;
       
        $update = [
            'id'                  => $id,
            'libelle'             => $libelle,
            'session'             => $session,
            'start'               => $start,
            'end'                 => $end,
            'status'              => $status,
        ];

        Association::where('id',$request->id)->update($update);
        $data = DB::table('associations')->get();
        $success = Toastr::success('Association modifier avec success','Success');
        return view('association.association_all',compact('data','success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Association::find($id);
        $delete->delete();
        Toastr::success('Association supprimer avec succès','Success');
        return redirect()->route('association.index');
    }
}
