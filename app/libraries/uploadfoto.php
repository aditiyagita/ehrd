<?php
class Uploadfoto {

    public static function write($filename, $file, $path) {
        
                 
        $directory = public_path().'/assets/images/'.$path;
        
        $upload_success = Input::file('imagefile')->move($directory, $filename); 
        //$upload_success = Image::make($file->getRealPath())->resize(300, 200)->save('foo.jpg');  //http://www.edzynda.com/simple-image-manipulation-with-intervention-image/
           
        if( $upload_success ) {
            return $filename;
        } else {
            return Response::json('error', 400);
        }
    }
}