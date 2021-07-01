@extends("frontEnd.layouts.app")
 @section("main")
     <main style="margin-top: 75px;color: rgb(33, 37, 41);background: linear-gradient(#d9aac7, #450a3b);border-radius: 27px;">
         <div class="container text-center" style="margin-bottom: 7px">
             <div class="row">
                 <div class="col-md-12 justify-content-center">
                     <img id="Idimge" src="{{URL::asset('assets/img/nature-3082832_1920.jpg')}}" style="width: 323px;height: 200.594px;margin-top: 25px;">

                     <form method="post" action="{{route('postAddImage')}}" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                             <label class="d-flex" style="color: #ffffff;">{{__('messages.Select Image')}}</label>
                             <input class="form-control-file" type="file" onchange="readURL(this);"  style="color: #ffffff;background: #450a3b;border-radius: 4px;" required="" name="filleimage" accept="image/*">

                             <label class="d-flex" style="color: #ffffff;">{{__('messages.Image Name')}}</label>
                             <input class="form-control" type="text" style="background: #450a3b;color: #ffffff;" name="name" placeholder="{{__('messages.Image Name')}}" required="">

                             <label class="d-flex" style="color: #ffffff;">{{__('messages.Image Category')}}</label>
                             <input class="form-control" type="text" style="background: #450a3b;color: #ffffff;" placeholder="{{__('messages.Image Category')}}" name="category" required="">
                         </div>

                         <button class="btn btn-primary" type="submit" style="margin-bottom: 7px;background: #450a3b;border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;">{{__('messages.Save')}}</button>

                     </form>
                 </div>
             </div>
         </div>
     </main>
 @endsection

