<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use DataTables;

class ProductCategoryController extends Controller
{
    //Display Interface
    public function index(Request $request){
        $content['title']="Product Category";
        $content['heading']="Product Category List";
       if ($request->ajax()) {
            //echo "here";die;
            $data = ProductCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="product_category/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('product_category.destroy',$row->id).'" onclick="deleteProductcategory('.$row->id.')">Delete</button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.product_category.index',$content);

    }

    //Add Interface

    public function create(){
        $content['title']="Product Category";
        $content['heading']="Add Product Category";
        return view('admin.product_category.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['title']="Product Category";
        $content['heading']="Edit Product Category";
        $content['jobcategory']=ProductCategory::where('id',$id)->get();
        return view('admin.product_category.edit', $content);
    }

    //Delete Function
    public function destroy(Request $request,$id)
    {
        ProductCategory::where('id',$id)->delete();
        return back();
    }



    //function for file upload , add annual report 
    public function product_categoryPost(Request $request)
    {
        $request->validate([
            'file' => 'required',
		]);
        
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        request()->file->storeAs('product_category', $fileName, 'public');
        $userid = Auth::id();
        $model = new ProductCategory;
        $model->user_id = $userid;
        $model->name = $request->name;
        $model->image = $fileName;
        $model->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $model->save();
        
        return response()->json(['success'=>'Job Category successfully added']);
       
    }

    public function edit_product_category(Request $request, $id){
         $userid = Auth::id();
        if(isset($request->file)){
            
            $fileName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->storeAs('product_category', $fileName, 'public');
            $edit_image = ProductCategory::find($request->cert_id);
            $edit_image->user_id = $userid;
            $edit_image->image = $fileName;
            $edit_image->update();
            return response()->json(['success'=>'You have successfully upload file.']);

        }else{
        
            $userid = Auth::id();
            $edit_annreport = ProductCategory::find($id);
            $edit_annreport->user_id = $userid;
            $edit_annreport->name = $request->name;
            $edit_annreport->update();
            return redirect('admin/product_category/edit/'.$id)->with('message', 'Update Success');
        }
        

    }

}
