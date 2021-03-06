<?php

namespace App\Traits;

Trait  ImageTrait
{
    function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }
    function saveOnDesktop($image){
        $path_desktop="C:\\Users\\".getenv("username")."\\Desktop\\";
        $file=$path_desktop.$image->name.".".pathinfo($image->path,PATHINFO_EXTENSION);
        copy($image->path,$file);
    }

}
