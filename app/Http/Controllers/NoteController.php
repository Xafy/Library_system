<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function create(){
        return view('notes.create');
    }

    public function store(Request $req){
        $req->validate(['content' => 'required|string']);

        $content = $req->content;
        $user_id = Auth::user()->id;

        Note::create([
            'user_id' => $user_id,
            "content" => $content]);

        return redirect()->to(route('users.index'));
    }
}
