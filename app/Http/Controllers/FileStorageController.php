<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\FileStorage;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function index(Card $card)
    {
        // return 1;
        $data = FileStorage::all();
        return Inertia::render('filestorage/index', [
            'pageTitle'=>'Files',
            'datatables' => $data,
            'model'=> ['id'=>$request->input('id'),'model' => $request->input('model')]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function create(Card $card)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Card $card)
    {
        // $data = Card::find($request->input('item'));
        // return Inertia::render('card/index', [
        //     'pageTitle'=>'Files',
        //     'datatables' => $data,
        //     'model'=> [
        //         'id'=>$request->input('id'),
        //         'model' => $request->input('model'),
        //         'route' => redirect()->back()
        //     ]
        // ]);
        // return $request;
        if ($request->hasFile('singlefile')) {
            // =============================================================================
            // // example 1
            // $path = $request->file('singlefile');
            // // echo $path->hashName(); // get unique file name 
            // // $path->store('files'); // store file to storage/app/files
            // $path->storePublicly('files'); // store file to storage/app/files
            // // end example 1
            // example 2
            $path = $request->file('singlefile');
            // echo $path->hashName(); // get unique file name 
            $path = Storage::putFile('files', $path); // store file to storage/app/files
            // echo $path; // get target fail
            // end example 2
            // =============================================================================
            // FileStorage::create([
            //     'title'=>$request->title ?? $path->getClientOriginalName(),
            //     'filename'=>$path->hashName(),
            //     'path'=>"files\\".storage_path($path->hashName()),
            //     // URL::asset('temp/'.$fileName);
            //     'model'=>'card',
            //     'model_id'=>$row->id,
            // ]);
            return $path;
        } else {
            return $request;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @param  \App\Models\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card, FileStorage $fileStorage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @param  \App\Models\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card, FileStorage $fileStorage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @param  \App\Models\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card, FileStorage $fileStorage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @param  \App\Models\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card, FileStorage $fileStorage)
    {
        //
    }
}
