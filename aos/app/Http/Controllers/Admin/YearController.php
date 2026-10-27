<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Year;
use App\Models\Composition;
use Illuminate\Http\Request;
use DataTables;

class YearController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Year";
        $content['heading']="Year List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = Year::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="year/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('year.destroy',$row->id).'" onclick="deleteYear('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.year.index',$content);

    }

    //Add Interface

    public function create(){
        $content['title']="Year";
        $content['heading']="Add Years";
        return view('admin.year.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['title']="Years";
        $content['heading']="Edit Years";
        $content['year']=Year::where('id',$id)->get();
        return view('admin.year.edit', $content);
    }

    // //Delete Function
    public function destroy(Request $request,$id)
    {
        Year::where('id',$id)->delete();
        return back();
    }



    // //function for file upload , add annual report 
    public function yearPost(Request $request)
    {
        //echo $request->name;die;
        $model = new Year;
        $model->year = $request->name;
        $model->save();
        
        return response()->json(['success'=>'Year successfully added']);
       
    }

    public function edit_year(Request $request, $id){
        // $userid = Auth::id();
        $edit_annreport = Year::find($id);
        // $edit_annreport->user_id = $userid;
        $edit_annreport->year = $request->name;
        $edit_annreport->update();
        return redirect('admin/year/edit/'.$id)->with('message', 'Update Success');
        

    }

}
