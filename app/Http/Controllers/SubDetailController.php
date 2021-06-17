<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\FileStorage;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

// abstract class Commentable extends \Eloquent {}
// class FileStorage extends Commentable {}
class SubDetailController extends Controller
{
    public function index(Request $request)
    {
        // print_r($request->all());
        // die();
        $data = FileStorage::all();
        return Inertia::render('subdetail/index', [
            'pageTitle'=>'Files',
            'datatables' => $data,
            'model'=> ['id'=>$request->input('id'),'model' => $request->input('model')]
        ]);
    }
    public function create(Request $request)
    {
        return 1;
    }
    public function store(Request $request)
    {
        $data = FileStorage::all();
        return Inertia::render('subdetail/index', [
            'pageTitle'=>'Files',
            'datatables' => $data,
            'model'=> ['id'=>$request->input('id'),'model' => $request->input('model')]
        ]);
        // print_r($request->all());
        // die();
        // if ($row && $request->hasFile('singlefile')) {
        //     // =============================================================================
        //     // // example 1
        //     // $path = $request->file('singlefile');
        //     // // echo $path->hashName(); // get unique file name 
        //     // // $path->store('files'); // store file to storage/app/files
        //     // $path->storePublicly('files'); // store file to storage/app/files
        //     // // end example 1
        //     // example 2
        //     $path = $request->file('singlefile');
        //     // echo $path->hashName(); // get unique file name 
        //     $path = Storage::putFile('files', $path); // store file to storage/app/files
        //     // echo $path; // get target fail
        //     // end example 2
        //     // =============================================================================
        //     // FileStorage::create([
        //     //     'title'=>$request->title ?? $path->getClientOriginalName(),
        //     //     'filename'=>$path->hashName(),
        //     //     'path'=>"files\\".storage_path($path->hashName()),
        //     //     // URL::asset('temp/'.$fileName);
        //     //     'model'=>'card',
        //     //     'model_id'=>$row->id,
        //     // ]);
        //     echo $path;
        // }
    }
    public function show($id)
    {
        $data = Card::find($id);
        return Inertia::render('card/show', [
            'pageTitle'=>'Card',
            'formTitle'=>'Show',
            'defaultItem' => $data
        ]);
    }
}
