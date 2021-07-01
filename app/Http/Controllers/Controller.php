<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use ImageTrait;

    public function index(Request $request){

        $categories = Image::distinct()->select('category')
            ->groupBy('category')->get();

        if($request->search!=null && $request->select!='All'){

            $images =Image::where('name',$request->search)->where('category',$request->select)->get();
            return view('frontEnd.index',compact('images','categories'));

        }elseif($request->search!=null && $request->select=='All'){
            $images =Image::where('name',$request->search)->get();
            return view('frontEnd.index',compact('images','categories'));
        }else{
            $images =Image::all();
            return view('frontEnd.index',compact('images','categories'));
        }


    }
    public function home(Request $request){
        $categories = Image::distinct()->select('category')
            ->groupBy('category')->get();
        if($request->search!=null && $request->select=='All'){
            $images =Image::where('user_id',Auth::id())->where('name',$request->search)->get();
            return view('frontEnd.Home',compact('images','categories'));

        }elseif($request->search!=null && $request->select!='All'){
            $images =Image::where('user_id',Auth::id())->where('name',$request->search)
                ->where('category',$request->select)->get();
            return view('frontEnd.Home',compact('images','categories'));

        }else{
            $images =Image::where('user_id',Auth::id())->get();
            return view('frontEnd.Home',compact('images','categories'));

        }

    }

    public function getAddImage(){
        return view('frontEnd.AddImage');
    }
    public function getupdateImage(Request $request){
        $image=Image::find($request->id);
        return view('frontEnd.UpdateImage',compact('image'));
    }
    public function delete($id){
        $image=Image::find($id);
        $image->destroy($id);
        return redirect()->route('home');
    }

    public function postAddImage(Request $request){
        $file_name = $this->saveImage($request->filleimage, 'images');
         Image::create([
            'name'=>$request->name,
            'path'=>'images/'.$file_name,
           'category'=>$request->category,
            'mylike'=>0,
            'unlike'=>0,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route("home");

    }
    public function postupdateImage(Request $request,$id){
        $image=Image::find($id);
        if($request->hasFile("filleimage")){
            $file_name = $this->saveImage($request->filleimage, 'images');
            $image->path='images/'.$file_name;
            $image->name=$request->name;
            $image->category=$request->category;
            $image->mylike=$request->mylike;
            $image->unlike=$request->unlike;
            $image->update();

        }else{
            $image->name=$request->name;
            $image->category=$request->category;
            $image->mylike=$request->mylike;
            $image->unlike=$request->unlike;
            $image->update();
        }
        return redirect()->route("home");
    }
    public function Like($id){
        $image=Image::find($id);
        $image->mylike=$image->mylike+1;
        $image->update();
        return redirect()->route("index");
    }
    public function disLike($id){
        $image=Image::find($id);
        $image->unlike=$image->unlike+1;
        $image->update();
        return redirect()->route("index");
    }
    public function downloadFromIndex($id){
        $image=Image::find($id);
        $this->saveOnDesktop($image);
        return redirect()->route("index");
    }
    public function downloadFromHome($id){
        $image=Image::find($id);
        $this->saveOnDesktop($image);
        return redirect()->route("home");
    }
}
