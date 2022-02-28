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
        if (Auth::user()->role_name=='Super')
        {
            $data = User::get();
            return view('membre.membre_all',compact('data'));
        }
        elseif (Auth::user()->role_name=='Admin')
        {
            $data = User::get()->where('role_name','Membre')->where('association_id',Auth::user()->association_id);
            return view('membre.membre_all',compact('data'));
        }
        elseif (Auth::user()->role_name=='Membre')
        {
            $data = User::get()->where('role_name','Membre')->where('association_id',Auth::user()->association_id);
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
        if (Auth::user()->role_name=='Super')
        {
            $associations = DB::table('associations')->get();
        }
        elseif (Auth::user()->role_name=='Admin')
        {
            $associations = DB::table('associations')->where('user_id',Auth::user()->association_id)->get();
        }

        $profil = DB::table('roles')->get();
        $userStatus = DB::table('user_types')->get();
        
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
            'email'        => 'required|string|email|max:255',
            'phone_number' => 'required|string|size:9',
            'cni'          => 'string|size:9',
            'profil'       => 'required|string|max:50',
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
            $profil       = $request->profil;
            $status       = $request->status;
            // $password     = substr(str_shuffle(str_repeat($pool, 5)), 0, 8);

            $user = new User();
            $user->name            = $name;
            $user->email           = $email;
            $user->phone_number    = $phone_number;
            $user->cni             = $cni;
            $user->profil          = $profil;
            $user->role_name       = 'Membre';
            $user->association_id  = $association_id;
            $user->status          = $status;
            $user->password        = Hash::make(123456);
            $user->save();

            $userid = User::orderBy('id', 'DESC')->first();


            $member = new Membre();
            $member->association_id = $association_id;
            $member->user_id        = $userid->id;
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
        $data = User::where('id',$id)->get();
        $userAssociations = DB::table('associations')->get();
        $roleType = DB::table('roles')->get();
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
            'email'                 => $email,
            'cni'                   => $cni,
            'phone_number'          => $phone_number,
            'association_id'        => $association_id,
            'profil'                => $role_name,
            'status'                => $status,
        ];

        User::where('id',$request->id)->update($update);
        // $data = Membre::all();
        
        Toastr::success('Informations modifier avec success','Success');
        return redirect()->back();
    }
    // invitation controller
    public function invite($id)
    {
        // $id   = $request->id;
        $info = User::where('id',$id)->orderBy('id', 'DESC')->get();
        $phone = $info[0]->phone_number;

        $update = [
            'id'                    => $id,
            'status'                => 'Active',
        ];

        User::where('id',$id)->update($update);

         // sending invitation notification
         $password = "admin237mvengi";
         $message ="Invitation accepter sur la plateforme tontine MOINI, vous pouvez à présent vous connecter avec vos identifiants";

         $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $phone . "&message=" . $message);
        
        $data = User::get()->all();
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
        $delete = User::find($id);
        $delete->delete();
        Toastr::success('Membre supprimer avec succès','Success');
        return redirect()->route('membre.index');
    }
}
