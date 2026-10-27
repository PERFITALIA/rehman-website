<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Csr;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class CsrController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Csr Policy";
        $content['heading']="Csr Policy List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Csr::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="csr/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('csr.destroy',$row->id).'" onclick="deleteCsr('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.csr_policy.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Csr Policy";
        $content['heading']="Add Csr Policy";
        return view('admin.csr_policy.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Csr Policy";
        $content['heading']="Csr Polciy Edit";
        $content['csr']=Csr::where('id',$id)->get();
        return view('admin.csr_policy.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Csr::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function CsrPost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'csr policy';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Csr;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        // $model->year = $request->years;
        $model->year = date("Y");
        $model->save();

       
        
        return response()->json(['success'=>'Csr policy Added']);
        }
    }
    
    public function edit_csr(Request $request, $id){
        
        $file = $request->file('file');
        // echo 'here';die;
        
        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'csr policy';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
            $file->move($destinationPath, $fileName); 
            $edit_annreport = Csr::find($id);
            $edit_annreport->title = $request->name;
            // $edit_annreport->year = $request->years;
            $edit_annreport->link= '/'.$folderName . '/' . $fileName;
            $edit_annreport->update();
            return redirect('admin/csr/edit/'.$id)->with('message', 'Update Success');
        }else{
            $edit_annreport = Csr::find($id);
            $edit_annreport->title = $request->name;
            // $edit_annreport->year = $request->years;
            $edit_annreport->update();
            return redirect('admin/csr/edit/'.$id)->with('message', 'Update Success');
        } 

        
    }

}
