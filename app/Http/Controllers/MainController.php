<?php

namespace App\Http\Controllers;

use App\AnsweredQuestions;
use App\Questions;
use App\User;
use App\GradGifts;
use App\DefaultGradGifts;
use App\AccountDetails;
use App\InterestedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Question\Question;
use Illuminate\Support\Facades\Hash;
use Image;
use Session;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    
    public function Home()
    {
        $uri = URL::current();
        $url =strstr($uri, 'www');
        if($url){
        return view('pages.home');
        }else{
            $trimmed =  ltrim($uri,"https://");
            $remain_uri = rtrim($trimmed,".myclassof.com");
            $data['user'] = User::where('profile_url', $remain_uri)->first();
            if($data['user']){
            $data['ans'] = AnsweredQuestions::where('user_id', $data['user']['id'])->with('Questions')->get();
             return view('pages.customProfile', $data);
            }else{
                return abort(404);
            }
        }
    }
    
    public function Legal()
    {
        return view('pages.legal');
    }
    
    public function Conditions()
    {
        return view('pages.conditions');
    }
    
    public function Privacy()
    {
        return view('pages.privacy');
    }
    
    public function WhoWe()
    {
        return view('pages.whoweare');
    }
    
    public function OurServices()
    {
        return view('pages.ourservices');
    }
    
    public function Support(Request $request)
    {
        return view('pages.support');
    }
    
    public function ContactUs()
    {
        return view('pages.contactus');
    }
    
    public function AutoLogout()
    {
        return view('pages.autoLogout');
    }
    
    public function GradGift($id)
    {
        $data['user_info'] = User::where('id', $id)->get();
        $data['account_info'] = AccountDetails::where('user_id', $id)->get();
        $data['gifts'] = GradGifts::where('user_id', $id)->get();
        return view('pages.gradgift', $data);
    }
    
    public function PrivateGradGift()
    {
        $data['account_info'] = AccountDetails::where('user_id', Auth::user()->id)->get();
        $data['gifts'] = GradGifts::where('user_id', Auth::user()->id)->get();
        return view('pages.privateGradgift', $data);
    }
    
    public function AccountDetails()
    {
        return view('pages.accountdetails');
    }
    
    public function Dashboard()
    {
        $data['ans'] = AnsweredQuestions::where('user_id', Auth::user()->id)->with('Questions')->get();
        $data['default_gifts'] = DefaultGradGifts::get();
        $data['gifts'] = GradGifts::where('user_id', Auth::user()->id)->get();
        $data['paypal_details'] = AccountDetails::where('user_id', Auth::user()->id)->get();
        return view('pages.dashboard', $data);
    }
    
    public function AddDefaultGifts(Request $request)
    {
        $all_data = $request->all();
        for ($i = 1; $i < count($all_data['gift']); $i++){
            if(isset($all_data["checkbox-".$i])){
                $data = [
                    'user_id' => Auth::user()->id,
                    'title' => $all_data['title-'.$i],
                    'description' => $all_data['description-'.$i],
                    'price' => $all_data['price-'.$i],
                    'image' => $all_data['image-'.$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                GradGifts::create($data);
            }
        }
        
        return redirect(route('dashboard'));
    }
    
    public function AddGradGifts(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => "public/images/grad/default_gift.png",
            'created_at' => now(),
            'updated_at' => now()
        ];
        GradGifts::create($data);
        return redirect(route('dashboard'));
    }
    
    public function DeleteGradGift($id)
    {
        GradGifts::where('id', $id)->delete();
        return redirect(route('dashboard'));
    }
    
    public function EditGradGift(Request $request, $id)
    {
        GradGifts::where('id', $id)->update([
            'title' => $request->giftTitle,
            'price' => $request->giftPrice,
            'description' => $request->giftDescription
            ]);
        return redirect(route('dashboard'));
    }
    
    public function UpdatePaypal(Request $request)
    {
        AccountDetails::where('user_id', Auth::user()->id)->update([
            'paypal_email' => $request->paypal_email
            ]);
        return redirect(route('dashboard'));
    }
    
    public function UpdatePrivacySettings(Request $request)
    {
        User::where('id', Auth::user()->id)->update([
            'profile_privacy' => $request->profile_privacy,
            'gradgift_privacy' => $request->gradgift_privacy
            ]);
        return redirect(route('dashboard'));
    }

    public function Questions()
    {
        $data['question'] = Questions::where('status', 1)->get();
        $data['questions'] = Questions::where('status', 1)->get()->keyBy('id');
//        $data['questions_encode'] = json_encode($data['question_all']);
        return view('pages.questions', $data);
    }

    public function Question(Request $request)
    {
        $all_data = $request->all();
        AnsweredQuestions::where('user_id', Auth::user()->id)->delete();
        for ($i = 0; $i < count($all_data['ques_id']); $i++) {
            $f[] =[
                'user_id' => Auth::user()->id,
                'question_id' => $all_data['ques_id'][$i],
                'answer' => $all_data['ans-'.$i],
                'deatiled_answer' => $all_data['deatiled_answer'][$i] ? $all_data['deatiled_answer'][$i] : "Not Answered",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        
        $save_ans = AnsweredQuestions::insert($f);
        if($save_ans and $all_data['form-complete-status'] == "true"){
            return redirect(route('dashboard'));
        }
        else{
            return redirect(route('autoLogout'));
        }
    }
    
    public function UpdateQuestions(Request $request)
    {
        $all_data = $request->all();
        AnsweredQuestions::where('user_id', Auth::user()->id)->delete();
        for ($i = 0; $i < count($all_data['ques_id']); $i++) {
            $f[] =[
                'user_id' => Auth::user()->id,
                'question_id' => $all_data['ques_id'][$i],
                'answer' => $all_data['ans-'.$i],
                'deatiled_answer' => $all_data['deatiled_answer'][$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        
        $save_ans = AnsweredQuestions::insert($f);
        if($save_ans){
            return redirect(route('dashboard'));
        }
    }

    public function Profile(Request $request, $id)
    {
        $data['user_info'] = User::where('id', $id)->get();
        $data['ans'] = AnsweredQuestions::where('user_id', $id)->with('Questions')->get();
        return view('pages.profile', $data);
    }
    
    public function PrivateProfile()
    {
        $data['ans'] = AnsweredQuestions::where('user_id', Auth::user()->id)->with('Questions')->get();
        return view('pages.privateProfile', $data);
    }

    public function ProfileChange(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($request->hasfile('dp_image'))
        {
            $file = $request->file('dp_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/images/', $filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->back();

    }
    
    public function UpdateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->username = is_null($request->username) ? $user->username : $request->username;
        $user->email = is_null($request->email) ? $user->email : $request->email;
        
        $user->save();
        return redirect()->back();
    }
    
    public function ChangePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
    
    public function AccountDetail(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'paypal_email' => $request->paypal ? $request->paypal : "Not given"
        ];
        AccountDetails::create($data);
        
        return redirect(route('create.profile'));
    }
    
    
    
    public function CreateProfile()
    {
        return view('pages.createprofile');
    }
    
    
    
    public function CreateProfiles(Request $request)
    {
        if($request->deatiled_answer == null || $request->deatiled_answer !== null){
            if($request->deatiled_answer !== null){
                $has_data = User::where('profile_url', $request->deatiled_answer)->get();
                if($has_data){
                    $notification = Session::flash('message', 'Already taken!'); 
                    return back()->with($notification);
                }
            }
            $data = [
            'profile_url'=>$request->deatiled_answer
            ];
            User::where('id', Auth::user()->id)->update($data);
        
        $From = "admin@myclassof.com";
            $FromName = "Admin";
            $to_email = "nabeel7129@gmail.com";
            \Mail::send('mail.profile', [
                'url' => $request->deatiled_answer,
            ], function ($message) use ($to_email, $From, $FromName) {
                $message->to($to_email)->from($From, $FromName)->subject("Profile URL");
            });
         
         return redirect(route('dashboard'));
        }
    }
    
    
    
    public function Contact(Request $request)
    {
        $validatedData = $request->validate([]);
        $From = "admin@myclassof.com";
            $FromName = "Admin";
            $to_email = "nabeel7129@gmail.com";
            \Mail::send('mail.contact', [
                'name' => $request->txtName,
                'email' => $request->txtEmail,
                'phone' => $request->txtPhone,
                'msg' => $requesinterestedt->txtMsg,
            ], function ($message) use ($to_email, $From, $FromName) {
                $message->to($to_email)->from($From, $FromName)->subject("Contact");
            });
            
            return redirect()->back();
    }
    
    public function Popup() {
        return view('popup');
    }
    
    public function Interested(Request $request) {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ];
        InterestedUser::create($data);
    }
}
