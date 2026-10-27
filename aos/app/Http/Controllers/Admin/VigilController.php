<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Vigil;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class VigilController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Vigil Mechanism Policy";
        $content['heading']="Vigil Mechanism Policy List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Vigil::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="vigil/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('vigil.destroy',$row->id).'" onclick="deleteVigil('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.vigil_mechanism_policy.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Vigil Mechanism Policy";
        $content['heading']="Add Vigil Mechanism Policy";
        return view('admin.vigil_mechanism_policy.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Vigil Mechanism Policy";
        $content['heading']="Vigil Mechanism Policy Edit";
        $content['vigil']=Vigil::where('id',$id)->get();
        return view('admin.vigil_mechanism_policy.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Vigil::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function VigilPost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'vigil mechanism policy';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Vigil;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        // $model->year = $request->years;
        $model->year = date("Y");
        $model->save();

       
        
        return response()->json(['success'=>'Vigil Mechanism policy Added']);
        }
    }

    public function edit_vigil(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'vigil mechanism policy';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
            $file->move($destinationPath, $fileName); 
        $edit_annreport = Vigil::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/vigil/edit/'.$id)->with('message', 'Update Success');

        }else{
        $edit_annreport = Vigil::find($id);
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->update();
        return redirect('admin/vigil/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
