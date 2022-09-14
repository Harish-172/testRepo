<?php

namespace App\Helpers;
use Illuminate\Support\Facades\File;


/**
 * 
 * FileUploadHelper class is used for upload the file.
 */
class FileUploadHelper{

    /**
     * 
     * upload the file
     * @return filename
     */
    
    public static function fileUpload($fileName){
        if (!File::exists("uploads/images")) {
            File::makeDirectory("uploads/images");
        }                  
        $fileDuplicateName = time().".".$fileName->getClientOriginalExtension();                
        $destinationPath = 'uploads/images';
        $uploadFile = $fileName->move($destinationPath,$fileDuplicateName);  
        return $fileDuplicateName;
    }    
}