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
    public function create()
    {
        return Inertia::render('card/create', [
            'pageTitle'=>'Card',
            'formTitle'=>'Create',
            'defaultItem' => [
                'name'=> "",
                'date_create'=> date("Y-m-d"),
                'minimal'=> 0,
                'maximal'=> 0,
                'ability'=> "easy",
                'istrue'=> 0,
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
    public function edit($id)
    {
        $data = Card::find($id);
        return Inertia::render('card/edit', [
            'pageTitle'=>'Card',
            'formTitle'=>'Edit',
            'defaultItem' => $data
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
