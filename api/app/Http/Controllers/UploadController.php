<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UploadedFileResource;
use Response;
use Auth;

class UploadController extends Controller
{
    public function upload(Request $request){
        $file =  $request->file('file');
        $fileName = $file->getClientOriginalName();
        $tmp = explode("." , $fileName);

        unset($tmp[count($tmp) - 1 ]);
        
        $fileName = implode("_" , $tmp) . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file = Storage::putFileAs( 'logos' , $request->file , $fileName);

        $path  = env('AWS_URL')."$fileName" ; 

        return Response::json([
            'path'      => $path,
            'fileName'  => $fileName
        ] , 200);

    }

    /**
     * Delete File From Storage
     */
    public function destroy(Request $request){
        
        if(Storage::delete( '/logos/'.$request->uploded_file_name)){
            return Response::json([
              'fileName'  => $request->uploded_file_name
            ] , 200);
        }
        return Response::json('We could not delete this file!', 400);
    }
}
