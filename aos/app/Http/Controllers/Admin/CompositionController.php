<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Composition;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class CompositionController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Composition of CSR Committee";
        $content['heading']="Composition of CSR Committee List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Composition::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="composition/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('composition.destroy',$row->id).'" onclick="deleteComposition('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.compostiton_of_csr_committee.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Composition of CSR Committee";
        $content['heading']="Add Composition of CSR Committee";
        return view('admin.compostiton_of_csr_committee.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Composition of CSR Committee";
        $content['heading']="Composition of CSR Committee Edit";
        $content['composition']=Composition::where('id',$id)->get();
        return view('admin.compostiton_of_csr_committee.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Composition::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function CompositionPost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'composition of csr committe';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Composition;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        // $model->year = $request->years;
        $model->year = date("Y");
        $model->save();

       
        
        return response()->json(['success'=>'Composition of CSR committee successfully added']);
        }
    }

    public function edit_composition(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'composition of csr committe';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
            $file->move($destinationPath, $fileName); 
        // $userid = Auth::id();
        $edit_annreport = Composition::find($id);
        // $edit_annreport->user_id = $userid;
        $edit_annreport->title = $request->name;
        // $edit_annreport->year = $request->years;
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/composition/edit/'.$id)->with('message', 'Update Success');
        }
        else{
        $edit_annreport = Composition::find($id);
        $edit_annreport->title = $request->name;
        $edit_annreport->update();
        return redirect('admin/composition/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
