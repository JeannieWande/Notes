<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\note;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    
    public function index(){
        if(Auth::check()){
            $users=Auth::user();
            $notes=$users->notes;
            $numberOfNotes=count($notes);
            return view('notes.index', compact('users', 'notes', 'numberOfNotes'));
        }
        else{
            return view('welcome');
        }
     
    }
    public function create(){
        return view('notes.create');
    }
    public function show($id){
        $showNote=note::findOrFail($id);
        return view('notes.show', compact('showNote'));
    }
    public function edit($id){
        $editNote=note::findOrFail($id);
        return view('notes.edit', compact('editNote')); 
    }
    public function store(Request $request){
        $validated= $request->validate([
            'title'=>'required|max:255',
            'note-text'=>'required',
        ]);
        $note=new note();
        $note->title=$request->input('title');
        $note->note=$request->input('note-text');
        $note->user_id = Auth::id();
        $note->save();
        return redirect()->route('notes.index')->with('message','A new note was created');
    }  
    public function update(Request $request, $id){
        $validated= $request->validate([
            'title'=>'required|max:255',
            'note-text'=>'required',
        ]);
        $updateNote=note::find($id);
        $updateNote->title=$request->input('title');
        $updateNote->note=$request->input('note-text');
        $updateNote->update();
        return redirect()->route('notes.index')->with('success', 'The note was updated successfully');
    } 
    public function delete($id){
        $deleteNote=note::findOrFail($id);
        $deleteNote->delete();
        return redirect()->route('notes.index')->with('delete', 'The note was sccessfully deleted');
    }
}
