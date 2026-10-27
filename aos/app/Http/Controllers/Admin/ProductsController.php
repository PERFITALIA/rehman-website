<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\Brands;
use DataTables;
use Illuminate\Support\Str;
use Image;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $content['title']="Products";
        $content['heading']="Products List";
        if ($request->ajax()) {
            $data = Products::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="products/edit/'.$row->id.'" class="edit btn btn-warning">Edit</a> <button class="delete btn btn-danger" data-id="'.$row->id.'" data-action="'.route('products.destroy',$row->id).'" onclick="deleteBrands('.$row->id.')">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
      
        return view('admin.product.index',$content);

    }

    //Add Interface

    public function create(){
        $content['title']="Products";
        $content['heading']="Add Products";
        $content['product_cat'] = ProductCategory::get();
        $content['brands'] = Brands::get();
        return view('admin.product.create', $content);
    }

    //Edit Interface

    public function edit($id){
        $content['title']="Products";
        $content['heading']="Edit Products";
        $content['products']=Products::where('id',$id)->get();
        return view('admin.product.edit', $content);
    }

    //Delete Function
    public function destroy(Request $request,$id)
    {
        Brands::where('id',$id)->delete();
        return back();
    }



    //function for file upload , add certificate 
    public function productsPost(Request $request)
    {
        ini_set('memory_limit','256M');
        
        $userid = Auth::id();
//         $request->validate([
//             'file' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
// 		]);
        
            
            
            $image = $request->file('file');
            $input['main_image'] = time().'.'.$image->extension();
         
            $destinationPath = public_path('/thumbnails');
            $img = Image::make($image->path());
            $img->resize(111, 106, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['main_image']);
       
            $destinationPath = public_path('/products');
            $img = Image::make($image->path());
            $img->resize(639, 442, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['main_image']);
            
            
            $product = new Products;
            $product->user_id = $userid;
            $product->product_category = $request->prod_cat;
            $product->name =  $request->name;
            $product->color =  $request->color;
            $product->size_range =  $request->size_range;
            $product->short_description =  $request->short_desc;
            $product->description =  $request->product_desc;
            $product->brand_id =  $request->brand;
            $product->areas_of_application =  $request->area_application;
            $product->standard =  $request->standard;
            $product->properties =  $request->properties;
            $product->height =  $request->height;
            $product->categories =  $request->other_category;
            $product->image =  $input['main_image'];
            if($request->prod_cat == "9"){
                $slug= "safety-helmet";
            }elseif($request->prod_cat == "8"){
                $slug= "gloves";
            }elseif($request->prod_cat == "7"){
                $slug= "safety-footwear";
            }elseif($request->prod_cat == "10"){
                $slug= "workwear";
            }elseif($request->prod_cat == "15"){
                $slug= "hearing-protection";
            }elseif($request->prod_cat == "14"){
                $slug= "eye-face-protection";
            }
            $product->slug =  $slug;
            $product->save();
            
            if($request->file('other_imgs')){
                $image = $request->file('other_imgs');
                $i=1;
                foreach($image as $key => $file){
                    //echo $i;
                    $image = $file;
                    $input['main_image'] = rand(0000000000,9999999999).'.'.$image->extension();
                 
                    $destinationPath = public_path('/thumbnails');
                    $img = Image::make($image->path());
                    $img->resize(111, 106, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['main_image']);
               
                    $destinationPath = public_path('/products');
                    $img = Image::make($image->path());
                    $img->resize(639, 442, function ($constraint) {
                        //$constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['main_image']);
                    
                    
                    DB::table('other_images')->insert([
                        'product_id' => $product->id,
                        'img' => $input['main_image'],
                        'sort_order' => $i
                    ]);
                    $i++;
                }
            }


            return response()->json(['success'=>'You have successfully upload file.']);
       
    }

    public function edit_products(Request $request, $id){
        $userid = Auth::id();
        $short_desc = $request->short_desc;
        $product_desc = $request->product_desc;
        $area_application = $request->area_application;
        
        
        $userid = Auth::id();
        $edit_annreport = Products::find($id);
        $edit_annreport->user_id = $userid;
        $edit_annreport->short_description =  $short_desc;
        $edit_annreport->description =  $product_desc;
        $edit_annreport->areas_of_application =  $area_application;
        
        $edit_annreport->update();
        
        
        
           if($request->file('file')){
            $image = $request->file('file');
            $input['main_image'] = time().'.'.$image->extension();
         
            $destinationPath = public_path('/thumbnails');
            $img = Image::make($image->path());
            $img->resize(111, 106, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['main_image']);
       
            $destinationPath = public_path('/products');
            $img = Image::make($image->path());
            $img->save($destinationPath.'/'.$input['main_image']);
            
             $userid = Auth::id();
            $edit_annreport = Products::find($id);
            $edit_annreport->user_id = $userid;
            $edit_annreport->image = $input['main_image'];
            $edit_annreport->update();
           }     
            
            
        
             if($request->file('other_imgs')){
                $image = $request->file('other_imgs');
                $i=1;
                foreach($image as $key => $file){
                    //echo $i;
                    $image = $file;
                    $input['main_image'] = rand(0000000000,9999999999).'.'.$image->extension();
                 
                    $destinationPath = public_path('/thumbnails');
                    $img = Image::make($image->path());
                    $img->resize(111, 106, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['main_image']);
               
                    $destinationPath = public_path('/products');
                    $img = Image::make($image->path());
                    $img->save($destinationPath.'/'.$input['main_image']);
                    
                   DB::table('other_images')
                
                    ->insert(array('product_id'=>$id,'img' =>  $input['main_image'],'sort_order'=>$i));  // update the record in the DB.
                    $i++;
                    
                    
                    
                  
                }
            }
            
            return redirect('admin/products/edit/'.$id)->with('message', 'Update Success');

    }
    
    public function create_slug(){
        $products = Products::all();
        foreach($products as $row){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['name'])));
            DB::table('products')
                ->where('id', $row['id'])  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('product_slug' => $slug));  // update the record in the DB.

        }
    }

}
