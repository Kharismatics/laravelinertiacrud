<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $data = Card::all();
        return Inertia::render('card/index', [
            'pageTitle'=>'Card',
            'datatables' => $data
        ]);
    }
    public function create(Request $request)
    {
        return Inertia::render('card/create', [
            'pageTitle'=>'Card',
            'formTitle'=>'Create',
            'defaultItem' => [
                'name'=> $request->old('name'),
                'date_create'=> $request->old('date_create',date('Y-m-d')), // default now
                'minimal'=> $request->old('minimal'),
                'maximal'=> $request->old('maximal'),
                'ability'=> $request->old('ability','easy'),
                'istrue'=> $request->old('istrue',0), // default 0
            ]
        ]);
    }
    public function store(Request $request)
    { 
        $validated = $request->validate([
            'name' => 'required',
            'date_create' => 'required|date',
            'minimal' => 'required|numeric|min:50',
            'maximal' => 'required|numeric|min:50',
            'ability' => 'required',
        ]);
        if ($request->hasFile('singlefile')) {
            // upload file
        }
        Card::create($request->all());
        return redirect()->route('card.index')->with('message', 'Data Created Successfully.');
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
    public function edit(Request $request, $id)
    {
        $data = Card::find($id);
        return Inertia::render('card/edit', [
            'pageTitle'=>'Card',
            'formTitle'=>'Edit',
            'defaultItem' => ( $request->old() ? $request->old() : $data)
        ]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'date_create' => 'required|date',
            'minimal' => 'required|numeric|min:50',
            'maximal' => 'required|numeric|min:50',
            'ability' => 'required',
        ]);
  
        if ($request->has('id')) {
            Card::find($request->input('id'))->update($request->all());
            return redirect()->route('card.index')->with('message', 'Data Updated Successfully.');
        }
    }
    public function destroy($id)
    {
        Card::find($id)->delete();
        return redirect()->back()->with('message', 'Data Deleted Successfully.');
    }
}
