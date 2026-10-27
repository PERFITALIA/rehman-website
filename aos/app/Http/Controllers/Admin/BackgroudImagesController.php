<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BackgroudImages;
use Illuminate\Http\Request;
use DataTables;

class BackgroudImagesController extends Controller
{
    //Display Covid Interface
    public function index(Request $request){
        $title = $request->p;
        $content['title']="Covid";
        $content['heading']="Covid Page Elements";
       
        $content['covid'] = BackgroudImages::where('title','=',$title)->get();
           
      
        return view('admin.backgroudimages.index',$content);

    }


    public function edit_backgroud_image(Request $request, $id){
        $userid = Auth::id();
        if(isset($request->file_banner)){
            $fileName_image = time().'.'.request()->file_banner->getClientOriginalExtension();
            request()->file_banner->storeAs('backgroud-image', $fileName_image, 'archive');
            $edit_image = BackgroudImages::find($id);
            $edit_image->user_id = $userid;
            $edit_image->image = $fileName_image;
            $edit_image->update();
            return response()->json(['success'=>'You have successfully upload file.']);

        }else if(isset($request->file_banner_mobile)){
            $fileName_image_m = time().'.'.request()->file_banner_mobile->getClientOriginalExtension();
            request()->file_banner_mobile->storeAs('backgroud-image/mobile', $fileName_image_m, 'archive');
            $edit_image = BackgroudImages::find($id);
            $edit_image->user_id = $userid;
            $edit_image->image_mobile = $fileName_image_m;
            $edit_image->update();
            return response()->json(['success'=>'You have successfully upload file.']);
        }else{
            $slug = BackgroudImages::select('title')->where('id','=',$id)->get();
            $edit_page = BackgroudImages::find($id);
            $edit_page->user_id = $userid;
            $edit_page->title = $request->title;
            $edit_page->class = $request->class;
            $edit_page->image_text = $request->image_text;
            $edit_page->update();
            return redirect('admin/backgroud_image?p='.$slug[0]->title)->with('message', 'The success message!');
        }

    }

}
