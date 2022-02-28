<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Session;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\Membre;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;


class UserManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Super')
        {
            $data = DB::table('users')->get();
            return view('usermanagement.user_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }
    // view detail 
    public function viewDetail($id)
    {  
        if (Auth::user()->role_name=='Super')
        {
            $data = DB::table('users')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
    }
    // activity log
    public function activityLogInLogOut()
    {
        $activityLog = DB::table('activity_logs')->get();
        return view('usermanagement.activity_log',compact('activityLog'));
    }

    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }
   
    // add new user
    public function addNewUser()
    {
        $profil = DB::table('role_type_users')->get();
        $userStatus = DB::table('user_types')->get();
        $associations = DB::table('associations')->get();
        return view('usermanagement.add_new_user',compact('profil','userStatus','associations'));
    }

     // save new user
     public function addNewUserSave(Request $request)
     {

        $request->validate([
            'name'      => 'required|string|max:255',
            // 'image'     => 'required|image',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone_number'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'status'       => 'required|string|max:255',
            'association_id'    => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        try {
            // $image = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('images'), $image);

            $user = new User;
            $user->name         = $request->name;
            $user->avatar       = $request->image;
            $user->email        = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role_name    = $request->role_name;
            $user->status    = $request->status;
            $user->password     = Hash::make($request->password);
            $user->save();

            $member = new Membre();
            $member->name            = $request->name;
            $member->email_address   = $request->email;
            $member->phone_number    = $request->phone_number;
            $member->role_name       = $request->role_name;
            $member->association_id  = $request->association_id;
            $member->status          = $request->status;
            $member->avatar          = $request->image;
            $member->password        = $request->password;
            $member->save();

            Toastr::success('Utilisateur créer avec succès','Success');
            return redirect()->route('userManagement');
        } catch (\Exception $e) {
            Toastr::success('Erréure de création','Success');
            // return redirect()->route('userManagement');
        }
    }
    
    // update
    public function update(Request $request)
    {
        $id           = $request->id;
        $fullName     = $request->fullName;
        $email        = $request->email;
        $phone_number = $request->phone_number;
        $status       = $request->status;
        $role_name    = $request->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $old_image = User::find($id);

        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($old_image->avatar=='photo_defaults.jpg')
        {
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
            }
        }
        else{
            
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
                unlink('images/'.$old_image->avatar);
            }
        }
        
        
        $update = [

            'id'           => $id,
            'name'         => $fullName,
            'avatar'       => $image_name,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
        ];

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        User::where('id',$request->id)->update($update);
        Toastr::success('User updated successfully :)','Success');
        return redirect()->route('userManagement');
    }
    // delete
    public function delete($id)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $fullName     = $user->name;
        $email        = $user->email;
        $phone_number = $user->phone_number;
        $status       = $user->status;
        $role_name    = $user->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Delete',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);

        $delete = User::find($id);
        // unlink('images/'.$delete->avatar);
        $delete->delete();
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }

    // view change password
    public function changePasswordView()
    {
        return view('usermanagement.change_password');
    }
    
    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Toastr::success('User change successfully :)','Success');
        return redirect()->route('home');
    }
}









