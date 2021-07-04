<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OtherController extends Controller
{

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }
    

     /// get all admin..
     public function AllAdmin()
     {
         $admins = DB::table('admins')->where('id','!=',Auth::id() )->get();
         return view('admin.other.all_admin',compact('admins'));
     }

     /// get all admin..
     public function AllUser()
     {
         $users = DB::table('users')->get();
         return view('admin.other.all_user',compact('users'));
     }

     /// Delete Admin...
     public function DeleteAdmin($id)
     {
         $admin = DB::table('admins')->where('id',$id)->first();
         if ($admin->profile_photo_path == 'media/admin/avatar.png') {
             DB::table('admins')->where('id',$id)->delete();
             // Display a toaster  Delete message..
             $notification = array(
                 'message' => 'Admin Deleted Successfully',
                 'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);

         } else {
             unlink($admin->profile_photo);
             DB::table('admins')->where('id',$id)->delete();
             // Display a toaster  Delete message..
             $notification = array(
                 'message' => 'Admin Deleted Successfully',
                 'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
         }
     }

     // Add New Admin..
     public function StoreAdmin(Request $request)
     {
         $request->validate([
             'name'     => 'required',
             'email'    => 'required|email|unique:users',
             'password' => 'required|min:6',
         ]);

         $data = array();
         $data['name'] = $request->name;
         $data['email'] = $request->email;
         $data['created_at'] = Carbon::now();
         $data['email_verified_at'] = Carbon::now();
         $data['profile_photo_path'] = 'media/admin/avatar.png';
         $data['remember_token'] = Str::random(10);
         $data['password'] = Hash::make($request->password);

         DB::table('admins')->insert($data);

         // Display a toaster  Store message..
         $notification = array(
             'message' => 'Admin Inserted Successfully',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);

     }

     // Show User Info..
     public function ShowUser($id)
     {
         $user = DB::table('users')->where('id',$id)->first();

         return view('admin.other.show',compact('user'));
     }


}
