<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Brands;
use Illuminate\Http\Request;
use DataTables;

class BrandsController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Brands";
        $content['heading']="Brands List";
        if ($request->ajax()) {
            $data = Brands::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="brands/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('brands.destroy',$row->id).'" onclick="deleteBrands('.$row->id.')">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.brands.index',$content);

    }

    //Add Interface

    public function create(){
        $content['title']="Brands";
        $content['heading']="Add Brands";
        return view('admin.brands.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['title']="Brands";
        $content['heading']="Edit Brands";
        $content['certificate']=Brands::where('id',$id)->get();
        return view('admin.brands.edit', $content);
    }

    //Delete Function
    public function destroy(Request $request,$id)
    {
        Brands::where('id',$id)->delete();
        return back();
    }



    //function for file upload , add certificate 
    public function brandsPost(Request $request)
    {
        $userid = Auth::id();
        $request->validate([
            'file' => 'required',
		]);
        
            $fileName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->storeAs('brands', $fileName, 'public');

            $brands = new Brands;
            $brands->user_id = $userid;
            $brands->title = $request->title;
            $brands->image = $fileName;
            $brands->save();

            return response()->json(['success'=>'You have successfully upload file.']);
       
    }

    public function edit_brands(Request $request, $id){
        $userid = Auth::id();
        if(isset($request->file)){
            
            $fileName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->storeAs('brands', $fileName, 'public');
            $edit_image = Brands::find($request->cert_id);
            $edit_image->user_id = $userid;
            $edit_image->image = $fileName;
            $edit_image->update();
            return response()->json(['success'=>'You have successfully upload file.']);

        }else{
            $edit_cerificatet = Brands::find($id);
            $edit_cerificatet->user_id = $userid;
            $edit_cerificatet->title = $request->title;
            $edit_cerificatet->update();
            return redirect('admin/brands/edit/'.$id)->with('message', 'The success message!');
        }

    }

}
