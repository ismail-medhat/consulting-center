<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{


    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }
    

    // Get All Post From Database..
    public function index()
    {
        $post = DB::table('posts')->get();
        return view('admin.post.index', compact('post'));

    }

    // Create Post and Store it in Database..
    public function create()
    {
        $post = DB::table('posts')->get();
        return view('admin.post.create', compact('post'));
    }


    // store post into database..
    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();
        if ($request->status == 'Active') {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $post_photo = $request->file('photo');

        $photo_name = hexdec(uniqid()) . '.' . $post_photo->getClientOriginalExtension();
        Image::make($post_photo)->resize(500, 500)->save('media/admin/post/' . $photo_name);
        $data['photo'] = 'media/admin/post/' . $photo_name;
        //return response()->json($data);
        $post = DB::table('posts')->insert($data);
        // Display a toaster  store message..
        $notification = array(
            'message' => 'Post Inserted successfully.',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    // Change Post Status To Inactive..
    public function inactive($post_id)
    {
        DB::table('posts')->where('id', $post_id)->update(['status' => 0]);
        // Display a toaster  Updated message..
        $notification = array(
            'message' => 'Post successfully Inactive',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Change post Status To Active..
    public function active($post_id)
    {
        DB::table('posts')->where('id', $post_id)->update(['status' => 1]);
        // Display a toaster  Updated message..
        $notification = array(
            'message' => 'Post successfully Active',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Delete Post From Database..
    public function DeletePost($post_id)
    {
        $post = DB::table('posts')->where('id', $post_id)->first();
        // Unlink course photo From public directory..
        $post_photo = $post->photo;
        unlink($post_photo);

        DB::table('posts')->where('id', $post_id)->delete();
        // Display a toaster  delete message..
        $notification = array(
            'message' => 'Post successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // View Product From Database..
    public function show($post_id)
    {
        $post = DB::table('posts')
            ->where('id', $post_id)
            ->first();
        //return response()->json($product);
        return view('admin.post.show', compact('post'));

    }

    // Edit Product Details..
    public function EditPost($post_id)
    {
        $post = DB::table('posts')->where('id', $post_id)->first();
        return view('admin.post.edit', compact('post'));
    }

    // Update Product without image..
    public function UpdatePost(Request $request, $post_id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();
        if ($request->status == 'Active') {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }


        $old_photo = $request->old_photo;
        $post_photo = $request->file('photo');
        if ($post_photo) {
            unlink($old_photo);
            $photo_name = hexdec(uniqid()) . '.' . $post_photo->getClientOriginalExtension();
            Image::make($post_photo)->resize(500, 500)->save('media/admin/post/' . $photo_name);
            $data['photo'] = 'media/admin/post/' . $photo_name;

            DB::table('posts')->where('id', $post_id)->update($data);
            // Display a toaster  update message..
            $notification = array(
                'message' => 'Post successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);

        } else {
            DB::table('posts')->where('id', $post_id)->update($data);
            // Display a toaster  update message..
            $notification = array(
                'message' => 'Post successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }

    }


}
