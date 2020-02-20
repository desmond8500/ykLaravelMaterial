<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parsedown;

class MaterialController extends Controller
{
    // Index
    public function index() {
        return view('material.pages.index');
    }

    public function folderlist($folder = null, $subfolder = null) {
        if ($subfolder != null) {
            $subfolder = glob("estm/$folder/$subfolder/*");
        }
        $folder = glob("estm/$folder/*");

        return view('material.pages.index',compact('folder', 'subfolder'));
    }

    public function markdown(Request $request){
        $fichier = request('file');

        $parse = str_replace('http://localhost:8000/', '', $fichier);
        $file = file_get_contents($parse);
        dump($parse);

        return view('material.pages.markdown',compact('file'));
    }
}
