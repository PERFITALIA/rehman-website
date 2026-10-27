<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Notice;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class NoticeController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Notice of Agm";
        $content['heading']="Notice of Agm List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Notice::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="notice/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('notice.destroy',$row->id).'" onclick="deleteNotice('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.notice_of_agm.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Notice of Agm";
        $content['heading']="Add Notice of Agm";
        return view('admin.notice_of_agm.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Notice of Agm";
        $content['heading']="Edit Notice of Agm";
        $content['notice']=Notice::where('id',$id)->get();
        return view('admin.notice_of_agm.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Notice::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function NoticePost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'notice of agm';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Notice;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        $model->year = $request->years;
        $model->save();

       
        
        return response()->json(['success'=>'Notice of Agm Added']);
        }
    }

    public function edit_notice(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'notice of agm';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
        $file->move($destinationPath, $fileName); 
        $edit_annreport = Notice::find($id);
        $edit_annreport->title = $request->name;
        $edit_annreport->year = $request->years;
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/notice/edit/'.$id)->with('message', 'Update Success');

        }
        else{
        $edit_annreport = Notice::find($id);
        $edit_annreport->title = $request->name;
        $edit_annreport->year = $request->years;
        $edit_annreport->update();
        return redirect('admin/notice/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
