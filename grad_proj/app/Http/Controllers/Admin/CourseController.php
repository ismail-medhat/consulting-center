<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

     // Get All Courses From Database..
     public function index()
     {
         $course = DB::table('courses')->get();
         return view('admin.course.index', compact('course'));

     }

     // Create Course and Store it in Database..
     public function create()
     {
         $course = DB::table('courses')->get();
         return view('admin.course.create', compact('course'));
     }


     // store corse into database..
     public function store(Request $request)
     {
         // validate input of Product Table..
 //        $request->validate([
 //            'en_name' => 'required',
 //            'ar_name' => 'required',
 //            'ar_description' => 'required',
 //            'en_description' => 'required',
 //            'day_number' => 'required|numeric',
 //            'hour_number' => 'required|numeric',
 //            'price' => 'required|numeric',
 //            'status' => 'required',
 //            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:50000',
 //        ]);


         $data = array();
         $data['en_name'] = $request->en_name;
         $data['ar_name'] = $request->ar_name;
         $data['ar_description'] = $request->ar_description;
         $data['en_description'] = $request->en_description;
         $data['day_number'] = $request->day_number;
         $data['hour_number'] = $request->hour_number;
         $data['price'] = $request->price;
         $data['created_at'] = Carbon::now();
         if ($request->status == 'Active') {
             $data['status'] = 1;
         } else {
             $data['status'] = 0;
         }


         $course_photo = $request->file('photo');

         $photo_name = hexdec(uniqid()) . '.' . $course_photo->getClientOriginalExtension();
         Image::make($course_photo)->resize(500, 500)->save('media/admin/course/' . $photo_name);
         $data['photo'] = 'media/admin/course/' . $photo_name;

         //return response()->json($data);

         $course = DB::table('courses')->insert($data);
         // Display a toaster  store message..
         $notification = array(
             'message' => 'Course Inserted successfully.',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);

     }

     // Change Course Status To Inactive..
     public function inactive($course_id)
     {
         DB::table('courses')->where('id', $course_id)->update(['status' => 0]);
         // Display a toaster  Updated message..
         $notification = array(
             'message' => 'Course successfully Inactive',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
     }

     // Change course Status To Active..
     public function active($course_id)
     {
         DB::table('courses')->where('id', $course_id)->update(['status' => 1]);
         // Display a toaster  Updated message..
         $notification = array(
             'message' => 'Course successfully Active',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
     }

     // Delete Product From Database..
     public function DeleteCourse($course_id)
     {
         $course = DB::table('courses')->where('id', $course_id)->first();
         // Unlink course photo From public directory..
         $course_photo = $course->photo;
         unlink($course_photo);

         DB::table('courses')->where('id', $course_id)->delete();
         // Display a toaster  delete message..
         $notification = array(
             'message' => 'Course successfully Deleted',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
     }

     // View Product From Database..
     public function show($course_id)
     {
         $course = DB::table('courses')
             ->where('id', $course_id)
             ->first();
         //return response()->json($product);
         return view('admin.course.show', compact('course'));

     }

     // Edit Product Details..
     public function EditCourse($course_id)
     {
         $course = DB::table('courses')->where('id', $course_id)->first();
         return view('admin.course.edit', compact('course'));
     }

     // Update Product without image..
     public function UpdateCourse(Request $request, $course_id)
     {
         $data = array();
         $data['en_name'] = $request->en_name;
         $data['ar_name'] = $request->ar_name;
         $data['ar_description'] = $request->ar_description;
         $data['en_description'] = $request->en_description;
         $data['day_number'] = $request->day_number;
         $data['hour_number'] = $request->hour_number;
         $data['price'] = $request->price;
         $data['updated_at'] = Carbon::now();
         if ($request->status == 'Active') {
             $data['status'] = 1;
         } else {
             $data['status'] = 0;
         }


         $old_photo = $request->old_photo;
         $course_photo = $request->file('photo');
         if ($course_photo) {
             unlink($old_photo);
             $photo_name = hexdec(uniqid()) . '.' . $course_photo->getClientOriginalExtension();
             Image::make($course_photo)->resize(500, 500)->save('media/admin/course/' . $photo_name);
             $data['photo'] = 'media/admin/course/' . $photo_name;

             DB::table('courses')->where('id', $course_id)->update($data);
             // Display a toaster  update message..
             $notification = array(
                 'message' => 'Course successfully Updated',
                 'alert-type' => 'success'
             );
             return Redirect()->route('all.course')->with($notification);

         } else {
             DB::table('courses')->where('id', $course_id)->update($data);
             // Display a toaster  update message..
             $notification = array(
                 'message' => 'Course successfully Updated',
                 'alert-type' => 'success'
             );
             return Redirect()->route('all.course')->with($notification);
         }

     }
}
