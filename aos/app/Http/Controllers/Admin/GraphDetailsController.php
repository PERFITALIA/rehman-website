<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GraphDetails;
use Illuminate\Http\Request;
use DataTables;

class GraphDetailsController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Graph Details";
        $content['heading']="Graph Details";
        if ($request->ajax()) {
            $data = GraphDetails::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="/cms_triveni/public/admin/graph_details/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('policy.destroy',$row->id).'" onclick="deletegraphdetails('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action','link'])
                ->make(true);
        }
      
        return view('admin.graphdetails.index',$content);

    }

    //Add Interface

    public function create(){
        $content['title']="Graph Details";
        $content['heading']="Add Graph Details";
        return view('admin.graphdetails.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['title']="Graph Details";
        $content['heading']="Edit Graph Details";
        $content['graphdetails']=GraphDetails::where('id',$id)->get();
        return view('admin.graphdetails.edit', $content);
    }

    //Delete Function
    public function destroy(Request $request,$id)
    {
        GraphDetails::where('id',$id)->delete();
        return back();
    }



    //function for file upload , add annual report 
    public function graphdetailsPost(Request $request)
    {
        $userid = Auth::id();
        
        $model = new GraphDetails;
        $model->user_id = $userid;
        $model->report_type = $request->report_type;
        $model->year = $request->year;
        $model->value = $request->value;
        $model->save();

        return redirect('admin/graph_details/add/')->with('message', 'Details Added Successfully!');
       
    }

    public function edit_graph_details(Request $request, $id){
        $userid = Auth::id();
        
        $model = GraphDetails::find($id);
        $model->user_id = $userid;
        $model->report_type = $request->report_type;
        $model->year = $request->year;
        $model->value = $request->value;
        $model->update();
        return redirect('admin/graph_details/edit/'.$id)->with('message', 'The success message!');
       

    }

}
