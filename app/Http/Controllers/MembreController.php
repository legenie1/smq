<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membre;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MembreController extends Controller
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
            $data = Membre::get()->all();
            return view('membre.membre_all',compact('data'));
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
        $profil = DB::table('role_type_users')->get();
        $userStatus = DB::table('user_types')->get();
        $associations = DB::table('associations')->get();
        return view('membre.membre_add',compact('userStatus','profil','associations'));
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
            'name'         => 'required|string|max:255',
            'sex'          => 'required',
            'email'        => 'required|string|email|max:255',
            'phone_number' => 'required|string|size:9',
            'cni'          => 'required|string|max:10',
            'role_name'    => 'required|string|max:255',
            'association_id'    => 'required|string|max:255',
            'status'       => 'required|string|max:255',
        ]);
        try{
            $name         = $request->name;
            $sex          = $request->sex;
            $email        = $request->email;
            $phone_number = $request->phone_number;
            $cni          = $request->cni;
            $association_id     = $request->association_id;
            $role_name    = $request->role_name;
            $status       = $request->status;
            $password     = substr(str_shuffle(str_repeat($pool, 5)), 0, 8);

            $member = new Membre();
            $member->name            = $name;
            $member->sex             = $sex;
            $member->email_address   = $email;
            $member->phone_number    = $phone_number;
            $member->cni             = $cni;
            $member->role_name       = $role_name;
            $member->association_id  = $association_id;
            $member->status          = $status;
            $member->password        = Hash::make(123456);
            $member->save();

            Toastr::success('Membre ajouter avec succès','Success');
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
        $data = Membre::where('id',$id)->get();
        $userAssociations = DB::table('associations')->get();
        $roleType = DB::table('role_type_users')->get();
        return view('membre.membre_edit',compact('data','userStatus','userAssociations','roleType'));
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
            $name         = $request->name;
            $sex          = $request->sex;
            $email        = $request->email;
            $phone_number = $request->phone_number;
            $cni          = $request->cni;
            $association_id     = $request->association_id;
            $role_name    = $request->role_name;
            $status       = $request->status;
       
        $update = [
            'id'                    => $id,
            'name'                  => $name,
            'sex'                   => $sex,
            'email_address'         => $email,
            'cni'                   => $cni,
            'phone_number'          => $phone_number,
            'association_id'        => $association_id,
            'role_name'             => $role_name,
            'status'                => $status,
        ];

        Membre::where('id',$request->id)->update($update);
        $data = Membre::get()->all();
        $success = Toastr::success('Membre modifier avec success','Success');
        return view('membre.membre_all',compact('data','success'));
    }
    // invitation controller
    public function invite($id)
    {
        // $id   = $request->id;
        $info = Membre::where('id',$id)->orderBy('id', 'DESC')->get();
        $phone = $info[0]->phone_number;

        $update = [
            'id'                    => $id,
            'status'                => 'Active',
        ];

        Membre::where('id',$id)->update($update);

         // sending invitation notification
         $password = "admin237mvengi";
         $message ="Invitation accepter sur la plateforme tontine MOINI, vous pouvez à présent vous connecter avec vos identifiants";

         $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $phone . "&message=" . $message);
        
        $data = Membre::get()->all();
        $success = Toastr::success('Invitation envoyé avec success','Success');
        return view('membre.membre_all',compact('data','success'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Membre::find($id);
        $delete->delete();
        Toastr::success('Membre supprimer avec succès','Success');
        return redirect()->route('membre.index');
    }
}
