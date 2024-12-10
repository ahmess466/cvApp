<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\education;
use App\Models\Image;
use App\Models\Info;
use App\Models\Language;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;



class BackendController extends Controller
{
    public function UserCv(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        return view('backend.basicinfo');
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function saveInfo(Request $request){
        Info::insert(
            [
                'user_id' =>Auth::user()->id,
                'name'=> $request->name ,
                'email'=> $request->email ,
                'phone'=> $request->phone ,
                'address'=> $request->address,
                'city' => $request->city ,



            ]

            );
            $notification = array(
                'message'=>'basic info inserted succesfully',
                'alert-type'=>'success',

            );
            return redirect()->route('user.profile')->with($notification);


    }
    public function UserProfile(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        return view('backend.profile');
    }
    public function saveProfile(Request $request){
        Profile::insert([
            'user_id' =>Auth::user()->id,
            'desc' => $request->desc ,
        ]);
        $notification = array(
            'message'=>'profile info inserted succesfully',
            'alert-type'=>'success',

        );
        return redirect()->route('user.skill')->with($notification);
    }
    public function EditInfo(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $info = Info::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if (!$info) {
            return redirect()->back()->with('error', 'No info found for this user.');
        }

        return view('backend.editInfo', compact('info'));
    }


    public function updateInfo(Request $request){
        $id = $request->id;
        Info::findOrFail($id)->update(
            [
                'user_id' =>Auth::user()->id,
                'name'=> $request->name ,
                'email'=> $request->email ,
                'phone'=> $request->phone ,
                'address'=> $request->address,
                'city' => $request->city ,



            ]

            );
            $notification = array(
                'message'=>'basic info Updated succesfully',
                'alert-type'=>'success',

            );
            return redirect()->route('edit.profile')->with($notification);


    }
    public function EditProfile(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $profile = Profile::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if (!$profile) {
            return redirect()->back()->with('error', 'No Profile found for this user.');
        }

        return view('backend.editprofile', compact('profile'));
    }

    public function updateProfile(Request $request){
        $id = $request->id;
        Profile::findOrFail($id)->update(
            [
                'user_id' =>Auth::user()->id,
                'desc' => $request->desc ,



            ]

            );
            $notification = array(
                'message'=>'Basic Profile Updated succesfully',
                'alert-type'=>'success',

            );
            return redirect()->back()->with($notification);
    }
    public function UserSkill(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        return view('backend.skill');
    }

    public function saveSkill(Request $request){
        Skill::insert([
            'user_id' =>Auth::user()->id,
            'skillName'=>$request->skillName,

        ]);
        $notification = array(
            'message'=>'Skills inserted succesfully',
            'alert-type'=>'success',

        );
        return redirect()->route('user.education')->with($notification);
    }

    public function EditSkill(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $skill = Skill::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $notification = array(
            'message'=>'No Skills Added Yet',
            'alert-type'=>'success',

        );

        if (!$skill) {
            return redirect()->back()->with($notification);
        }

        return view('backend.editskill', compact('skill'));

    }
    public function UpdateSkill(Request $request){
        $id = $request->id;
        Skill::findOrFail($id)->update([
            'user_id' =>Auth::user()->id,
            'skillName'=>$request->skillName,

        ]);
        $notification = array(
            'message'=>'Skills Updated succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);


    }
    public function UserEducation(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        $kinds = Level::get();
        return view('backend.education',compact('kinds'));
    }

    public function saveEducation(Request $request){
        education::insert([
            'user_id' =>Auth::user()->id,
            'eduName'=>$request->eduName,
            'level_id'=>$request->level_id,
            'StartDate'=>$request->StartDate,
            'EndDate'=>$request->EndDate,
            'desc'=>$request->desc,
            'field'=>$request->field,



        ]);
        $notification = array(
            'message'=>'Education inserted succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);
    }
    public function EditEducation(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $educations = education::where('user_id', Auth::user()->id)->get();

        if (!$educations) {
            return redirect()->back()->with('error', 'No Profile found for this user.');
        }

        return view('backend.editeducation', compact('educations'));

    }

    public function EducationEdit($id){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $educations = education::where('id',$id )->first();
        $kinds = Level::get();

        if (!$educations) {
            return redirect()->back()->with('error', 'No Profile found for this user.');
        }

        return view('backend.educationedit', compact('educations','kinds'));

    }
    public function UpdateEducation(Request $request){

        $id = $request->id;

        education::findOrFail($id)->update([
            'user_id' =>Auth::user()->id,
            'eduName'=>$request->eduName,
            'level_id'=>$request->level_id,
            'StartDate'=>$request->StartDate,
            'EndDate'=>$request->EndDate,
            'desc'=>$request->desc,
            'field'=>$request->field,



        ]);
        $notification = array(
            'message'=>'Education Updated succesfully',
            'alert-type'=>'success',

        );
        return redirect()->route('edit.education')->with($notification);
    }

    public function EducationDelete($id){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        education::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Education deleted succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);



    }
    public function UserLanguage(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        return view('backend.language');
    }
    public function saveLanguage(Request $request){
        Language::insert([
            'user_id' =>Auth::user()->id,
            'languageName'=>$request->languageName,

        ]);
        $notification = array(
            'message'=>'Languages inserted succesfully',
            'alert-type'=>'success',

        );
        return redirect()->route('user.image')->with($notification);
    }

    public function EditLanguage(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Retrieve the last inserted record for the authenticated user
        $language = Language::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $notification = array(
            'message'=>'No Languages Added Yet',
            'alert-type'=>'success',

        );

        if (!$language) {
            return redirect()->back()->with($notification);
        }

        return view('backend.editlanguage', compact('language'));

    }
    public function UpdateLanguage(Request $request){
        $id = $request->id;
        Language::findOrFail($id)->update([
            'user_id' =>Auth::user()->id,
            'languageName'=>$request->languageName,

        ]);
        $notification = array(
            'message'=>'Languages Updated succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);


    }
    public function UserImage(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        return view('backend.image');


    }
    public function SaveImage(Request $request){
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
        $img_name = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(480,480);
        $img->toJpeg(80)->save(base_path('public/upload/'.$img_name));
        $url = 'upload/'.$img_name ;
        Image::insert([
            'user_id' =>Auth::user()->id,
            'image'=>$url,

        ]);
        $notification = array(
            'message'=>'Image Uploaded succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);

        }





    }

    public function EditImage(){
        $image = Image::where('user_id',Auth::user()->id)->first();
        return view('backend.editimage',compact('image'));

    }

    public function UpdateImage(Request $request){
        $id = $request->id ;
        $old_img = $request->Old_img ;

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
        $img_name = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(480,480);
        $img->toJpeg(80)->save(base_path('public/upload/'.$img_name));
        $url = 'upload/'.$img_name ;
        if (file_exists($old_img)){
            unlink($old_img);

        }
        Image::findOrFail($id)->update([
            'image'=>$url,

        ]);
        $notification = array(
            'message'=>'Image Updated succesfully',
            'alert-type'=>'success',

        );
        return redirect()->back()->with($notification);

        }





    }

    public function CV(){
        return view('backend.cv');
    }






}
