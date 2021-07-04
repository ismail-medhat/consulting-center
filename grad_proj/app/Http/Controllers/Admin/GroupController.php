<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    // get all groups..
    public function AllGroup()
    {
        $groups = DB::table('groups')->get();
        return view('admin.group.index',compact('groups'));
    }

    // store group data..
    public function StoreGroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'start_date' => 'required',
        ]);

        $data = array();
        $data['group_name'] = $request->group_name;
        $data['start_date'] = Carbon::parse($request->start_date);
        $data['created_at'] = Carbon::now();
        DB::table('groups')->insert($data);

        //return response()->json($data);

        // Display a toaster  Insert message..
        $notification = array(
            'message' => 'Group Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    // Delete Group from Database..
    public function DeleteGroup($group_id)
    {
        DB::table('groups')->where('id',$group_id)->delete();
        // Display a toaster  Delete message..
        $notification = array(
            'message' => 'Group Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Edit Group Info
    public function EditGroup($group_id)
    {
        $group = DB::table('groups')->where('id',$group_id)->first();
        return view('admin.group.edit',compact('group'));
    }

    // Update Group Info..
    public function UpdateGroup(Request $request,$group_id)
    {
        $data = array();
        $data['group_name'] = $request->group_name;
        $data['start_date'] = Carbon::parse($request->start_date);

        $update_group = DB::table('groups')->where('id',$group_id)->update($data);

        if ($update_group)
        {
            // Display a toaster  Updated message..
            $notification = array(
                'message' => 'Group Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.group')->with($notification);
        }else{
            // Display a toaster  Delete message..
            $notification = array(
                'message' => 'Nothing Data Updated',
                'alert-type' => 'warning'
            );
            return Redirect()->route('all.group')->with($notification);
        }
    }

    public function groupAllocate()
    {
        $courses = DB::table('courses')->get();
        return view('admin.group.all_courses',compact('courses'));
    }

    public function courseApplicant($course_name)
    {
        $courseId = DB::table('courses')->where('en_name',$course_name)->first();
        $courseName = $course_name;
        $applicant = DB::table('courses_payments')
                        ->where('course_name',$course_name)

                        ->orderBy('pay_date','ASC')
                        ->get();
        return view('admin.group.applicant',compact('applicant','courseName','courseId'));
    }

    public function groupApplicant($course_name)
    {
        $applicant = DB::table('courses_payments')
        ->join('groups','courses_payments.group_id','groups.id')
        ->select('courses_payments.*','groups.*')
        ->where('courses_payments.course_name',$course_name)
        ->where('courses_payments.group_id','!=',NULL)
        ->get();
        return view('admin.group.group_applicant',compact('applicant'));
    }

    public function storeGroupApplicant(Request $request)
    {
        $groupId = $request->groupId;
        $userId = $request->userId;
        $courseId = $request->courseId;
        $Id = $request->Id;
        if($groupId == NULL)
        {
                // Display a toaster  Delete message..
                $notification = array(
                'message' => 'Nothing To Update',
                'alert-type' => 'warning'
                );
                return Redirect()->back()->with($notification);

        }else {

            DB::table('users_courses')
                    ->where('user_id',$userId)
                    ->where('course_id',$courseId)
                    ->update(array('group_id'=>$groupId));

            DB::table('courses_payments')
                    ->where('id',$Id)
                    ->update(array('group_id'=>$groupId));
            // Display a toaster  Delete message..
            $notification = array(
            'message' => 'Group Allocated Successfully',
            'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

        }
        //return response()->json($request);
    }

}
