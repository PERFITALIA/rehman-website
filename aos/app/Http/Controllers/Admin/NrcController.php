<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Nrc;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class NrcController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Nrc Policy";
        $content['heading']="Nrc Policy List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Nrc::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="nrc/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('nrc.destroy',$row->id).'" onclick="deleteNrc('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.nrc_policy.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Nrc Policy";
        $content['heading']="Add Nrc Policy";
        return view('admin.nrc_policy.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Nrc Policy";
        $content['heading']="Nrc Policy Edit";
        $content['nrc']=Nrc::where('id',$id)->get();
        return view('admin.nrc_policy.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Nrc::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function NrcPost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'nrc policy';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Nrc;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        // $model->year = $request->years;
        $model->year = date("Y");
        $model->save();

       
        
        return response()->json(['success'=>'Nrc policy Added']);
        }
    }

    public function edit_nrc(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'nrc policy';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
        $file->move($destinationPath, $fileName); 
        $edit_annreport = Nrc::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        // $model->year = date("Y");
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/nrc/edit/'.$id)->with('message', 'Update Success');

        }
        else{
        $edit_annreport = Nrc::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->update();
        return redirect('admin/nrc/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
