<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class DashboardController extends Controller
{
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }


    public function Dashboard()
    {
        return view('admin.dashboard');
    }


    public function edit()
    {
        $admin_info = DB::table('admins')->select()->where('id', Auth::id())->first();
        return view('admin.profile.edit_admin_info', compact('admin_info'));

    }


    public function UpdateProfile(Request $request)
    {

        $data = array();
        $data['email'] = $request->email;
        $data['name'] = $request->name;

        $profile_photo_path = $request->file('profile_photo');



        $admin_info = DB::table('admins')->select()->where('id', Auth::id())->first();

        if ($profile_photo_path)
        {
            $photo_name = hexdec(uniqid()) . '.' . $profile_photo_path->getClientOriginalExtension();
            $data['profile_photo_path'] = 'media/admin/' . $photo_name;

            if ($admin_info->profile_photo_path == 'media/admin/avatar.png') {
                Image::make($profile_photo_path)->resize(500, 500)->save('media/admin/' . $photo_name);
            } else {
                unlink($admin_info->profile_photo_path);
                Image::make($profile_photo_path)->resize(500, 500)->save('media/admin/' . $photo_name);
            }

            DB::table('admins')->where('id', Auth::id())->update($data);
        }else {
            DB::table('admins')->where('id', Auth::id())->update($data);
        }


        $notification = array(
            'message' => "profile updated Successfully",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);
    }


    public function DeletePhoto()
    {
        $admin_info = DB::table('admins')->select()->where('id', Auth::id())->first();
        unlink($admin_info->profile_photo_path);
        DB::table('admins')->where('id', Auth::id())->update(array('profile_photo_path'=>'media/admin/avatar.png'));
        $notification = array(
            'message' => "profile photo deleted",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);

    }


    public function password()
    {
        $admin_password = DB::table('admins')->select('password')->where('id', Auth::id())->first();
        return view('admin.profile.change_admin_password', compact('admin_password'));

    }


    public function change(Request $request)
    {

        $admin = Admin::select()->where('id', Auth::id())->first();
        $password = $admin->password;
        $old_password = $request->old_password;
        $new_password = $request->password;
        $password_confirm = $request->password_confirm;
        if (Hash::check($old_password, $password)) {
            if ($new_password === $password_confirm) {
                $admin->password = Hash::make($request->password);
                $admin->save();

                Auth::logout();

                $notification = array(
                    'message' => "password change successfully",
                    'alert-type' => "success",
                );
                return redirect()->route('admin.login')->with($notification);


            } else {
                $notification = array(
                    'message' => "new password not match with confirm password",
                    'alert-type' => "warning",
                );
                return redirect()->back()->with($notification);
            }

        } else {
            $notification = array(
                'message' => "old password not match",
                'alert-type' => "warning",
            );
            return redirect()->back()->with($notification);
        }
    }

    // All Setting Methods
    public function setting()
    {
        return view('admin.profile.setting');
    }

    public function storeSetting(Request $request)
    {


        $video_tmp =$request->file('video_link');
        $logo_tmp =$request->file('logo');
        $path = 'media/setting/';
        $video_link = $path.uniqid().'.'.$video_tmp->getClientOriginalExtension();
        $logo = $path.uniqid().'.'.$logo_tmp->getClientOriginalExtension();
        $video_tmp->move($path,$video_link);
        $logo_tmp->move($path,$logo);

        $data = array();
        $data['logo']       = $logo;
        $data['video_link'] = $video_link;
        $data['phone1']     = $request->phone1;
        $data['phone2']     = $request->phone2;
        $data['email']      = $request->email;
        $data['face_link']  = $request->face_link;
        $data['address']    = $request->address;
        $data['created_at'] = Carbon::now();

        DB::table('settings')->insert($data);
        $notification = array(
            'message' => "Setting Information Inserted",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);

    }


    public function editSetting()
    {
        $setting = DB::table('settings')->first();
        return view('admin.profile.edit_setting',compact('setting'));
    }

    public function updateSetting(Request $request)
    {
        $setting = DB::table('settings')->first();
        $old_video_link = $setting->video_link;
        $old_logo = $setting->logo;

        $data = array();
        $data['phone1']     = $request->phone1;
        $data['phone2']     = $request->phone2;
        $data['email']      = $request->email;
        $data['face_link']  = $request->face_link;
        $data['address']    = $request->address;
        $data['updated_at'] = Carbon::now();

        $video_tmp =$request->file('video_link');
        $logo_tmp =$request->file('logo');
        $path = 'media/setting/';

        if ($video_tmp == NULL) {
            if ($logo_tmp == NULL) {
                DB::table('settings')->update($data);
                $notification = array(
                'message' => "Setting Information Updated",
                'alert-type' => "success",
                );
                return redirect()->route('admin.settings')->with($notification);
            }else {
                unlink($old_logo);
                $logo = $path.uniqid().'.'.$logo_tmp->getClientOriginalExtension();
                $logo_tmp->move($path,$logo);
                $data['logo'] = $logo;
                // Update Setting Info With LOGO photo
                DB::table('settings')->update($data);
                $notification = array(
                'message' => "Setting Information Updated",
                'alert-type' => "success",
                );
                return redirect()->route('admin.settings')->with($notification);
                
            }
        }else {
            unlink($old_video_link);
            $video_link = $path.uniqid().'.'.$video_tmp->getClientOriginalExtension();
            $video_tmp->move($path,$video_link);
            $data['video_link'] = $video_link;
            // Update Setting Info With Video Link photo
            DB::table('settings')->update($data);
            $notification = array(
            'message' => "Setting Information Updated",
            'alert-type' => "success",
            );
            return redirect()->route('admin.settings')->with($notification);
        }


        return response()->json($request);
    }



}
