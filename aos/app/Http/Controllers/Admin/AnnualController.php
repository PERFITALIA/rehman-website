<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Annual;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use DB;

class AnnualController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Annual Return";
        $content['heading']="Annual Return List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Annual::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="annual/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('annual.destroy',$row->id).'" onclick="deleteAnnual('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.annual_return.index',$content);

    }
    //Add Interface

    public function create(){
        $content['yearData'] = Year::all();
        $content['title']="Annual Return";
        $content['heading']="Add Annual Return";
        return view('admin.annual_return.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['yearData'] = Year::all();
        $content['title']="Annual Return";
        $content['heading']="Edit Annual Return";
        $content['annual']=Annual::where('id',$id)->get();
        return view('admin.annual_return.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Annual::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function AnnualPost(Request $request)
    {
        $file = $request->file('file');

    if ($file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folderName = 'annual return';
        $destinationPath = public_path('files/' . $folderName);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);            

        $model = new Annual;
        $model->title = $request->name;
        $model->link = '/'.$folderName . '/' . $fileName;
        $model->year = $request->years;
        $model->save();

       
        
        return response()->json(['success'=>'Notice of Agm Added']);
        }
    }

    public function edit_annual(Request $request, $id){

        $file = $request->file('file');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $folderName = 'annual return';
            $destinationPath = public_path('files/' . $folderName);
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
        $file->move($destinationPath, $fileName); 
        $edit_annreport = Annual::find($id);
        $edit_annreport->title = $request->name;
        $edit_annreport->year = $request->years;
        $edit_annreport->link= '/'.$folderName . '/' . $fileName;
        $edit_annreport->update();
        return redirect('admin/annual/edit/'.$id)->with('message', 'Update Success');

        }
        else{
        $edit_annreport = Annual::find($id);
        $edit_annreport->title = $request->name;
        $edit_annreport->year = $request->years;
        $edit_annreport->update();
        return redirect('admin/annual/edit/'.$id)->with('message', 'Update Success');
        }
    }

}
