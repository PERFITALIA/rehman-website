<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class JoinUsController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title'] = "Join Us";
        $content['heading']="Join Us";
        
        $content['enq_type'] = $content['date1'] = $content['date2'] = '';
        $content['note'] = '*Note:- By Default only Last 3 Months data will be visible.';
        
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now();
        $content['enquiryData'] = DB::table('join_us')->select('*')->whereBetween('date_added',[$dateS,$dateE])->orderBy('date_added', 'DESC')->get();
        
        //echo "<pre>"; print_r($enquiryData); die;
        
        return view('admin.reports.join_us',$content);

    }
    
    public function filter(Request $request){
        $content['title'] = "Join Us";
        $content['heading']="Join Us";
        
        $content['enq_type'] = $content['date1'] = $content['date2'] = '';
        $content['note'] = '';
        
        $sdate = $request->date1;
        $edate = $request->date2;
        $sdateF = date('Y-m-d', strtotime($sdate))." 00:00:00";
        $edatef = date('Y-m-d', strtotime($edate))." 24:00:00";
        $content['date1'] = $sdate;
        $content['date2'] = $edate;
        
        $enq_type = $request->enq_type;
        if(isset($enq_type)){
            $content['enq_type'] = $enq_type;
            $content['enquiryData'] = DB::table('join_us')->select('*')->where('enq_type',$enq_type)->whereBetween('date_added',[$sdateF,$edatef])->orderBy('date_added', 'DESC')->get();
        }else{
            $content['enquiryData'] = DB::table('join_us')->select('*')->whereBetween('date_added',[$sdateF,$edatef])->orderBy('date_added', 'DESC')->get();
        }
        
        return view('admin.reports.join_us',$content);

    }

}
