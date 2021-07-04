<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function ViewCourses()
    {
        return view('courses_view');
    }
    
    public function viewCourseDetails($id)
    {
        $course = DB::table('courses')->where('id',$id)->first();
        return view('course_details',compact('course'));
    }

    public function registerCourse($course_id)
    {

        $user_id = Auth::id();
        $check = DB::table('users_courses')->where('user_id', $user_id)->where('course_id', $course_id)->first();
        $data = array();
        $data['user_id'] = $user_id;
        $data['course_id'] = $course_id;
        $data['skill_card_no'] = 'EGT '.rand(200,999).' '.rand(10,999999);
        $data['date_registerd'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        if (Auth::check()) {
            if ($check) {
                return response()->json(['error' => 'You have already registered for this course']);

            } else {
                DB::table('users_courses')->insert($data);
                return response()->json(['success' => ' Course Register Successfully']);
            }

        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function viewPosts(){
        return view('posts');
    }

    public function abouteUs(){
        return view('welcome');
    }

    public function showPost($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        return view('show_post',compact('post'));
    }

}
