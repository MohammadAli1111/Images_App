@extends("frontEnd.layouts.app")
 @section("main")
     <main style="margin-top: 100px;">
         <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
             <table class="table my-0" id="dataTable">
                 <thead>
                 <tr>
                     <th>Name</th>
                     <th>Like</th>
                     <th>Unlike</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($images as $image )
                 <tr>
                     <td>
                         <img class="img-thumbnail mr-2" width="100" height="100" src="{{URL::asset($image->path)}}">{{$image->name}}</td>
                     <td>{{$image->mylike}}</td>
                     <td>{{$image->unlike}}</td>
                     <td>

                         <form action="{{route('getupdateImage')}}" method="get" enctype="multipart/form-data" style="display: inline">
                             <input hidden="hidden" type="number" name="id" value="{{$image->id}}">
                             <button class="btn"  style="background: rgb(217,170,199);border-radius: 31px;margin: 1px;">
                                 <i class="fa fa-edit" style="color: var(--blue);margin: 1px;"></i>
                             </button>
                         </form>
                         <a class="btn" href="{{route('delete',['id'=>$image->id])}}" style="background: rgb(217,170,199);border-radius: 30px;margin: 1px;"><i class="fa fa-trash" style="color: var(--red);margin: 1px;background: rgb(217,170,199);"></i></a>
                         <a class="btn" href="{{route('home.download',["id"=>$image->id])}}" style="background: rgb(217,170,199);border-radius: 32px;margin: 1px;"><i class="fa fa-download" style="color: var(--success);"></i></a>
                     </td>
                 </tr>
                 @endforeach
                 </tbody>
                 <tfoot>
                 <tr>
                     <td><strong>Name</strong></td>
                     <td><strong>Like</strong></td>
                     <td><strong>Unlike</strong></td>
                     <td><strong>Action</strong></td>
                 </tr>
                 </tfoot>
             </table>
         </div>
     </main>
 @endsection

