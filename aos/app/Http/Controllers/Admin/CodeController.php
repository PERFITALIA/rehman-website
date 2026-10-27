<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Code;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class CodeController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Code of Independent Director";
        $content['heading']="Code of Independent Director List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Code::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="code/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('code.destroy',$row->id).'" onclick="deleteCode('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.code_of_independent_director.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Code of Independent Director";
        $content['heading']="Add Code of Independent Director";
        return view('admin.code_of_independent_director.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Code of Independed Director";
        $content['heading']="Code of Independent Director Edit";
        $content['code']=Code::where('id',$id)->get();
        return view('admin.code_of_independent_director.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Code::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function CodePost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'code of independent director';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Code;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        // $model->year = $request->years;
        $model->year = date("Y");
        $model->save();

       
        
        return response()->json(['success'=>'Nrc policy Added']);
        }
    }

    public function edit_code(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'code of independent director';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
        $file->move($destinationPath, $fileName); 
        $edit_annreport = Nrc::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/code/edit/'.$id)->with('message', 'Update Success');

        }
        else{
        $edit_annreport = Code::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->update();
        return redirect('admin/code/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
