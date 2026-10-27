<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array();
        $group_id = Auth::user()->group_id;
        Session::put('group_id', $group_id);
        
        $arr = array('agri','alcohol','power transmission','water solutions','defence','triveni turbine','general','brands');
        $data['counters']['total'] = 0;
        foreach($arr as $r){
            $contactUsEnq = \DB::table('contact_us')->where('enquiry_type', '=', $r)->get();
            $data['counters'][$r] = $contactUsEnq->count();
            $data['counters']['total'] += $contactUsEnq->count();
        }
        
        // $powerQ = \DB::table('power_quotation_form')->get();
        // $data['power_q'] = $powerQ->count();
        
        $joinUs = \DB::table('join_us')->get();
        $data['joinUs'] = $joinUs->count();
        
        // $shareServies = \DB::table('shareholder_services')->get();
        // $data['shareServies'] = $shareServies->count();
        
        // $shareSurvey = \DB::table('shareholder_survey_form')->get();
        // $data['shareSurbeyform'] = $shareSurvey->count();
        
        //echo "<pre>"; print_r($data); die;
        
        return view('admin.home',$data);
    }
    
    public function file_manager(){
        return view('admin.filemanager.index');
    }
    
    public function account_settings(){
        $content['title']="Account Settings";
        $content['heading']="Change Password";
        return view('admin.account-settings',$content);
    }
    
    public function changePassword(Request $request)
    {
        
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);
        $id = Auth::user()->id;
        
        $admin = \DB::table('admins')->where('id','=',$id)->get();

        if (!Hash::check($request->current_password, $admin[0
        ]->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        \DB::table('admins')
        ->where('id', $id)
        ->limit(1)  
        ->update(array('password' => Hash::make($request->password)));  

        return back()->with('success', 'Password successfully changed!');
        
    }
    
    public function change_password_frontend(Request $request)
    {
        
                        
        $user = \DB::table('users')->get();

        if ($request->password_doc != $request->password_confirmation_doc) {
            return back()->with('error', 'Current password does not match!');
        }
        \DB::table('users')
         ->limit(1)  
        ->update(array('password' => $request->password_doc));  

        return back()->with('success', 'Password successfully changed!');
        
    }
}