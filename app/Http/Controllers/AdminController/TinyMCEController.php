<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TinyMCEController extends Controller{
    public function upload_tinymce_image(){
        $file = request()->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('tinymce_uploads', $filename, 'public');
        return response()->json(['location' => "/storage/$path"]);
    }
}
