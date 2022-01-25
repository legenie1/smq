<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Models\User;
use App\Models\Membre;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        $associations = DB::table('associations')->get();
        return view('auth.register',compact('associations'));
    }

    public function userAssoc(Request $request)
    {
        // enregistrement en tant que utilisateur
        $request->validate([
            // for user and member
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone_number'  => 'required|string|size:9|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            // for association
            'libelle'                => 'required|string|max:255|unique:associations',
            'session'                => 'required|string|max:255',
            'start'                  => 'required|string|max:255',
            'end'                    => 'required|string|max:255',
        ]);

        $password = "admin237mvengi";
        $message ="Bienvenue sur la plateforme de tontine MOINI, votre mot de passe de connexion est " .$request->password;

        // $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $request->phone_number . "&message=" . $message);
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'phone_number' => $request->phone_number,
            'role_name' => $request->role_name,
            'status'    => "Active",
            'password'  => Hash::make($request->password),
        ]);

        $userid = User::orderBy('id', 'DESC')->first();

        // nous l'enregistrons également l'association

        $association = new Association;
        $association->libelle        = $request->libelle;
        $association->session        = $request->session;
        $association->start          = $request->start;
        $association->end            = $request->end;
        $association->user_id        = $userid->id;
        $association->status         = 'Active';
        $association->save();

        $associd = Association::orderBy('id', 'DESC')->first();
        // nous l'enregistrons également en tant que membre de l'association
        try{
            $name         = $request->name;
            $email        = $request->email;
            $phone_number = $request->phone_number;
            $association_id     = $associd->id;
            $role_name    = $request->role_name;
            $avatar       = $request->image;
            $password     = Hash::make($request->password);
            $status       = 'Active';

            $member = new Membre();
            $member->name            = $name;
            $member->email_address   = $email;
            $member->phone_number    = $phone_number;
            $member->role_name       = $role_name;
            $member->association_id  = $association_id;
            $member->status          = $status;
            $member->avatar          = $avatar;
            $member->password        = $password;
            $member->save();

            // sending password through sms notification
        $password = "admin237mvengi";
        $message ="Bienvenue chère administrateur sur la plateforme de tontine MOINI, votre mot de passe de connexion est     ".$request->password;

        $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $request->phone_number . "&message=" . $message);
        

        }catch(\Exception $e){
            return redirect()->back();
        }

        Toastr::success('Compte crée avec succès :)','Success');
        return redirect('login');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone_number'  => 'required|string|size:9|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $password = "admin237mvengi";
        $message ="Bienvenue sur la plateforme de tontine MOINI, votre mot de passe de connexion est " .$request->password;

        $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $request->phone_number . "&message=" . $message);
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'phone_number' => $request->phone_number,
            'role_name' => 'Membre',
            'status'    => "Desactiver",
            'password'  => Hash::make($request->password),
        ]);

        try{
            $name         = $request->name;
            $email        = $request->email;
            $phone_number = $request->phone_number;
            $association_id     = $request->association_id;
            $role_name    = 'Membre';
            $avatar       = $request->image;
            $password     = Hash::make($request->password);
            $status       = 'Desactiver';

            $member = new Membre();
            $member->name            = $name;
            $member->email_address   = $email;
            $member->phone_number    = $phone_number;
            $member->role_name       = $role_name;
            $member->association_id  = $association_id;
            $member->status          = $status;
            $member->avatar          = $avatar;
            $member->password        = $password;
            $member->save();

            // sending password through sms notification
        $password = "admin237mvengi";
        $message ="Bienvenue sur la plateforme de tontine MOINI, vous recevrez une confirmation par votre administrateur d'ici peu";

        $sending = Http::get("http://obitsms.com/api/bulksms?username=" . env('MAIL_USERNAME') . "&password=" . $password . "&sender=" .env('APP_NAME') . "&destination=" ."237". $request->phone_number . "&message=" . $message);
        

        }catch(\Exception $e){
            return redirect()->back();
        }

        Toastr::success('Compte créer avec succès consulter votre messagerie téléphonique','Success');
        return redirect('login');
    }
}
