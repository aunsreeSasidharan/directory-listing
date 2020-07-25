<?php

namespace App\Http\Controllers;
use App\History;

use Illuminate\Http\Request;
use DataTables;
use File;
use Validator;

class DirectoryListingController extends Controller
{
    public function index(Request $request){
        $path = public_path('files');
        $files = File::allFiles($path);
        $file_array= [];
        foreach($files as $value){
            

            array_push($file_array,array('filename' => $value->getFilename(),'sl_no' => 1));
        }
        //dd($file_array);
        if ($request->ajax()) {
            return Datatables::of($file_array)
                    ->addColumn('action', function ($file_array) {
                            return '<span class="actions"><a href="/delete/'.$file_array['filename'].'"><i class="fa fa-times-circle"></i></a></span>';                   
                    })
                     ->make(true);
        }
        return view('directory-listing',['files'=>$files]);
    }

    public function upload(Request $request) {
		$this->validate($request, [
            'file' => 'required|max:20000|mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif'
	    	
		]);

		$file = $request->file('file');
		// saving file to destination
        $file->move('files', $file->getClientOriginalName()); 
        $history =  new History;
        $history->action = $file->getClientOriginalName().' Uploaded';
        $history->date = date("Y-m-d h:i:s");
        $history->save();
		return redirect('directory-listing')->with('success', 'File Uploaded');
    }
    public function delete(Request $request,$filename){
        $path = public_path('files');
        File::delete($path.'/'.$filename);
        $history =  new History;
        $history->action = $filename.' Deleted';
        $history->date = date("Y-m-d h:i:s");
        $history->save();
        return redirect('directory-listing')->with('success', 'File Delected');
    }
    
}
