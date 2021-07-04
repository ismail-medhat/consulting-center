<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function index()
    {
        return view('dashboard');
    }


    public function allCourseRegister()
    {
        $all_course_register = DB::table('users_courses')
                                ->join('users','users_courses.user_id','users.id')
                                ->join('courses','users_courses.course_id','courses.id')
                                ->where('users_courses.user_id',Auth::id())
                                ->select('users_courses.*','courses.*')
                                ->get();


        return view('student.course_register',compact('all_course_register'));
    }

    public function deleteRegister($id)
    {
        $course = DB::table('users_courses')->where('course_id',$id)->where('user_id',Auth::id())->first();

        if ($course->payment_status == 0)
        {
            DB::table('users_courses')->where('course_id',$id)->where('user_id',Auth::id())->delete();
                    // Display a toaster  delete message..
                    alert()->success('SuccessAlert','Course Register Deleted successfully');
                    return Redirect()->back();

        }else {
             // Display a toaster  delete message..
             alert()->warning('Can\'t Deleted It','Course Payment Completed');
             return Redirect()->back();
        }

    }

    public function allPayCourse()
    {
        $all_course_register = DB::table('users_courses')
                                ->join('users','users_courses.user_id','users.id')
                                ->join('courses','users_courses.course_id','courses.id')
                                ->where('users_courses.user_id',Auth::id())
                                ->select('users_courses.*','courses.*')
                                ->get();

        return view('student.course_payment',compact('all_course_register'));
    }

    public function payCourse($id)
    {
        $status = DB::table('users_courses')->where('course_id',$id)->where('user_id',Auth::id())->first();
        if ($status->payment_status == 0)
        {

            if(Auth::user()->national_id == NULL )
        {
            toast('You Must Complete Your Information Before Complete Payment Process.','error');
            return redirect()->route('information');
        }else {

            $course_info = DB::table('users_courses')
            ->join('users','users_courses.user_id','users.id')
            ->join('courses','users_courses.course_id','courses.id')
            ->where('users_courses.user_id',Auth::id())
            ->where('users_courses.course_id',$id)
            ->select('users_courses.*','courses.*','users.*')
            ->first();

           return view('student.course_info',compact('course_info'));

        }

        }else {
            toast('This Course Is Already Paied Before','error');
            return redirect()->back();
        }

    }


    public function completeInfo()
    {
        $user = DB::table('users')->where('id',Auth::id())->first();
        return view('student.student_info',compact('user'));
    }


    public function saveInfo(Request $request)
    {

        $validateDate = $request->validate([
            'national_id' => 'required|numeric|unique:users|digits:14',
            'phone' => 'required|numeric|unique:users|digits:11',
            // 'national_id_photo' => 'required|numeric|unique:users|digits:14',
            // 'personal_photo' => 'required|mimes:jpeg,png,jpg',
            // 'national_id' => 'required|mimes:jpeg,png,jpg',
            'en_full_name' => ['required' , 'max:100' , 'regex:/^[a-zA-Z\s]*$/'],
            'ar_full_name' => ['required' , 'max:100' , 'regex:/^[^\u0621-\u064A]+$/'],
        ],
        [
            'ar_full_name.regex' => 'Name should be arabic text only.',
            'en_full_name.regex' => 'Name should be english text only.',
        ]);

        $user = DB::table('users')->where('id',Auth::id())->first();

        if($user->national_id != NULL)
        {
            toast('You Information Already Saved Before .','warning');
            return redirect()->back();

        }else {

            $data = array();
            $data['en_full_name'] = $request->en_full_name;
            $data['ar_full_name'] = $request->ar_full_name;
            $data['gender'] = $request->gender;
            $data['phone'] = $request->phone;
            $data['national_id'] = $request->national_id;
            $data['nationality'] = $request->nationality;

            $personal_photo = $request->file('personal_photo');
            $national_id_photo = $request->file('national_id_photo');

            $photo1_name = hexdec(uniqid()) . '.' . $personal_photo->getClientOriginalExtension();
            Image::make($personal_photo)->resize(500, 500)->save('media/user/personal/' . $photo1_name);
            $data['personal_photo'] = 'media/user/personal/' . $photo1_name;

            $photo2_name = hexdec(uniqid()) . '.' . $national_id_photo->getClientOriginalExtension();
            Image::make($national_id_photo)->resize(500, 500)->save('media/user/personal/' . $photo2_name);
            $data['national_id_photo'] = 'media/user/personal/' . $photo2_name;

            $user = DB::table('users')->where('id',Auth::id())->update($data);

            //return response()->json($data);
            toast('You Information Saved Successfully.','success');
            return redirect()->back();
        }

    }

    public function payProcess(Request $request)
    {
        if($request->payment == 'stripe')
        {
            $id = $request->course_id;
            $course_info = DB::table('users_courses')
            ->join('users','users_courses.user_id','users.id')
            ->join('courses','users_courses.course_id','courses.id')
            ->where('users_courses.user_id',Auth::id())
            ->where('users_courses.course_id',$id)
            ->select('users_courses.*','courses.*','users.*')
            ->first();
            return view('student.stripe_pay', compact('course_info'));

        }elseif($request->payment == 'fawry')
        {
            dd('fawry');
        }else {
            toast('You Must Choise Payment Method (Mastercard - Fawry ).','error');
        return redirect()->back();
        }
    }

    public function stripeCharge(Request $request)
    {
        $course = DB::table('courses')->where('en_name',$request->course_name)->first();
        $data = array();
        $data['course_id'] = $course->id;
        $data['course_price'] = $request->course_price;
        $data['course_name'] = $request->course_name;
        $data['student_name'] = $request->student_name;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['user_id'] = Auth::id();
        $data['pay_date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        //return response()->json($data);

        $total = $request->course_price;
        // TODO: Set your secret key. Remember to switch to your live secret key in production.
        // TODO: See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51IhZfEC5a5un6YA8wsggrfzOdW3S3acFwMutLsXtZnyQVf4NXgQXDFkG3vqSKhlfkdENSyQAbcjwG9uiHJZg8oUc00Pxn5n7Zb');
        // TODO: Token is created using Checkout or Elements!
        // TODO: Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'egp',
            'description' => 'Consulting Center',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        $status = DB::table('users_courses')->where('course_id',$course->id)->where('user_id',Auth::id())->update(array('payment_status'=>1));
        $pay_course = DB::table('courses_payments')->insert($data);

        $payment['user_id'] = Auth::id();
        $payment['payment_id'] = $charge->payment_method;
        $payment['paying_amount'] = ($charge->amount)/100;
        $payment['blnc_transaction'] = $charge->balance_transaction;
        $payment['stripe_order_id'] = $charge->metadata->order_id;
        $payment['date'] = date('d-m-y');
        $payment['month'] = date('F');
        $payment['year'] = date('Y');

        $pay = DB::table('payments')->insert($payment);

        if($pay)
        {
            toast('Payment Process Done Successfully.','success');
            return redirect()->route('course.payment');
        }else {
            toast('Somthing Wrong.','error');
            return redirect()->route('course.payment');
        }


    }


    public function registerServices()
    {
        return view('student.services');
    }

    public function courseServices()
    {

                    $courses = DB::table('courses_payments')
                    ->where('user_id',Auth::id())
                    ->get();
        return view('student.course_service',compact('courses'));
    }

    public function courseServicesInfo($course_name)
    {

        $course = DB::table('courses')
        ->where('en_name',$course_name)
        ->first();

        $course_pay = DB::table('courses_payments')
        ->where('user_id',Auth::id())
        ->where('course_name',$course_name)
        ->first();

        return view('student.course_service_info',compact('course','course_pay'));

    }

    public function viewCourseDetails($id)
    {
        $course = DB::table('courses')->where('id',$id)->first();
        return view('student.course_detials',compact('course'));
    }


    /* get course certificate */
    public function courseCertificate()
    {
        return view('student.certificates');
    }

    public function showCertificate($course_id){
        $payCourse = DB::table('courses_payments')->where('course_id',$course_id)->first();
        return view('student.showCertificate',compact('payCourse'));

    }

    /* course statement */
    public function courseStatement(){
        return view('student.statements');
    }



}
