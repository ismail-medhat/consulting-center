<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OtherController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\FrontendController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    return view('courses_view');
});

// Frontend All Route.
Route::get('/view/courses',[FrontendController::class,'ViewCourses'])->name('view.courses');
Route::get('course/details/{id}',[FrontendController::class,'viewCourseDetails'])->name('course.details');
Route::get('register/course/{id}',[FrontendController::class,'registerCourse']);
Route::get('view/posts',[FrontendController::class,'viewPosts'])->name('view.posts');
Route::get('show/post/{id}',[FrontendController::class,'showPost'])->name('show.post.user');
Route::get('info/aboute-us/',[FrontendController::class,'abouteUs'])->name('aboute.us');


Route::group(['prefix'=>'admin','middleware'=>['auth:sanctum,admin']],function(){

    //  edit admin info
    Route::get('/edit',[DashboardController::class,'edit'])->name('edit_admin_info');
    Route::post('update',[DashboardController::class,'UpdateProfile'])->name('admin.profile.update');
    Route::get('delete/profole-photo',[DashboardController::class,'DeletePhoto'])->name('admin.delete.photo');
    Route::get('dashboard',[DashboardController::class,'Dashboard'])->name('admin.dashboard');

    //  change admin password
    Route::get('/password',[DashboardController::class,'password'])->name('change_admin_password');
    Route::post('change',[DashboardController::class,'change'])->name('change.password');

        /// All Courses Route...
        Route::group(['prefix' => 'course'], function () {

        // Courses
        Route::get('all', [CourseController::class,'index'])->name('all.course');
        Route::get('add', [CourseController::class,'create'])->name('add.course');
        Route::post('store', [CourseController::class,'store'])->name('store.course');
        Route::get('view/{course_id}', [CourseController::class,'show'])->name('show.course');
        Route::get('active/{course_id}', [CourseController::class,'active'])->name('active.course');
        Route::get('inactive/{course_id}', [CourseController::class,'inactive'])->name('inactive.course');
        Route::get('delete/{course_id}', [CourseController::class,'DeleteCourse'])->name('delete.course');
        Route::get('edit/{course_id}', [CourseController::class,'EditCourse'])->name('edit.course');
        Route::post('update/{course_id}', [CourseController::class,'UpdateCourse'])->name('update.course');

    });

        /// All Others Route..
        Route::get('get/all', [OtherController::class,'AllAdmin'])->name('all.admin');
        Route::get('delete/{id}', [OtherController::class,'DeleteAdmin'])->name('delete.admin');
        Route::post('store', [OtherController::class,'StoreAdmin'])->name('store.admin');
        Route::get('get/user', [OtherController::class,'AllUser'])->name('all.user');
        Route::get('show/user/{id}', [OtherController::class,'ShowUser'])->name('show.user');

        /// All Groups Route
        Route::get('all/group', [GroupController::class,'AllGroup'])->name('all.group');
        Route::get('delete/group/{id}', [GroupController::class,'DeleteGroup'])->name('delete.group');
        Route::post('store/group', [GroupController::class,'StoreGroup'])->name('store.group');
        Route::get('edit/group/{id}', [GroupController::class,'EditGroup'])->name('edit.group');
        Route::post('update/group/{id}', [GroupController::class,'UpdateGroup'])->name('update.group');
        Route::get('allocate/group', [GroupController::class,'groupAllocate'])->name('group.allocate');
        Route::get('group/applicant/{course_name}', [GroupController::class,'courseApplicant'])->name('course.applicant');
        Route::get('all-group/applicant/{course_name}', [GroupController::class,'groupApplicant'])->name('group.applicant');
        Route::post('store/group/applicant', [GroupController::class,'storeGroupApplicant'])->name('store.group.applicant');

        /// All Posts Route...
    Route::group(['prefix' => 'post'], function () {

        // Posts
        Route::get('all', [PostController::class,'index'])->name('all.post');
        Route::get('add', [PostController::class,'create'])->name('add.post');
        Route::post('store', [PostController::class,'store'])->name('store.post');
        Route::get('view/{post_id}', [PostController::class,'show'])->name('show.post');
        Route::get('active/{post_id}', [PostController::class,'active'])->name('active.post');
        Route::get('inactive/{post_id}', [PostController::class,'inactive'])->name('inactive.post');
        Route::get('delete/{post_id}', [PostController::class,'DeletePost'])->name('delete.post');
        Route::get('edit/{post_id}', [PostController::class,'EditPost'])->name('edit.post');
        Route::post('update/{post_id}', [PostController::class,'UpdatePost'])->name('update.post');

    });

    // TODO: Settings Route..
    Route::get('settings', [DashboardController::class,'setting'])->name('admin.settings');
    Route::get('edit/settings', [DashboardController::class,'editSetting'])->name('edit.settings');
    Route::post('store/setting', [DashboardController::class,'storeSetting'])->name('store.setting');
    Route::post('update/setting', [DashboardController::class,'updateSetting'])->name('update.setting');


});

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');


});


Route::group(['middleware'=>['auth:sanctum,web']],function(){

    Route::get('/dashboard',[StudentController::class,'index'])->name('dashboard');
    Route::get('all/course/register',[StudentController::class,'allCourseRegister'])->name('course.register');
    Route::get('course/delete/register/{id}',[StudentController::class,'deleteRegister'])->name('delete.register');
    Route::get('course/pay/{id}',[StudentController::class,'payCourse'])->name('course.pay');
    Route::get('course/payment',[StudentController::class,'allPayCourse'])->name('course.payment');
    Route::get('information',[StudentController::class,'completeInfo'])->name('information');
    Route::post('save/info',[StudentController::class,'saveInfo'])->name('save.info');
    Route::post('pay/process',[StudentController::class,'payProcess'])->name('final.pay');
    Route::post('pay/stripe/process',[StudentController::class,'stripeCharge'])->name('stripe.charge');
    Route::get('register/services',[StudentController::class,'registerServices'])->name('register.services');
    Route::get('register/services/courses',[StudentController::class,'courseServices'])->name('course.services');
    Route::get('register/courses/cerificate',[StudentController::class,'courseCertificate'])->name('course.certificate');
    Route::get('register/courses/statement',[StudentController::class,'courseStatement'])->name('course.statement');
    Route::get('courses/show/cerificate/{course_id}',[StudentController::class,'showCertificate'])->name('show.certificate');
    Route::get('register/services/courses/{course_name}',[StudentController::class,'courseServicesInfo'])->name('service.course.info');
    Route::get('account/setting',[StudentController::class,'accountSetting'])->name('account.setting');
    Route::post('update/profile-photo',[StudentController::class,'updatePhoto'])->name('update.photo');
    Route::post('update/password',[StudentController::class,'updatePassword'])->name('update.password');
    Route::get('course/info/{id}',[StudentController::class,'viewCourseDetails'])->name('student.course.details');

});

// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
