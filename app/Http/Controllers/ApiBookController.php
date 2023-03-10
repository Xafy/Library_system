<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    //
    public function index(){
        $books = Book::select('id', 'title')->get();

        return response()->json($books);
    }
    
    public function show($id){
        $book = Book::findOrFail($id);

        return response()->json($book);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'image|mimes:jpg,png,jpeg',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $img = $req->file('img');
        $ext = $img->getClientOriginalExtension();
        $img_name = "book-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/books'), $img_name);

        $book = Book::create([
            'title' => $req->title,
            'desc' => $req->desc,
            'img' => $img_name
        ]);

        $book->categories()->sync($req->categories);

        return response()->json(["message" => "book created successfuly", "book" => $book]);
    }
    
    public function update($id, Request $req){
        
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'image|mimes:jpg,png,jpeg',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $book = Book::findOrFail($id);

        $name = $book->img;
        if ($req->hasFile('img')){
            if($name !== null){
                unlink(public_path('uploads/books/') . $name);
            }
            $img = $req->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book-" . uniqid() . ".$ext";
            $img->move(public_path('uploads/books'), $name);
        }

        $book->update([
            'title' => $req->title,
            'desc' => $req->desc,
            'img' => $name
        ]);
        $book->categories()->sync($req->categories);

        return response()->json("book updated");
    }
    
    public function delete($id){
        $book = Book::findOrFail($id);
        if($book->img !== null){
            unlink(public_path('uploads/books/') . $book->img);
        }
        $book->categories()->sync([]);
        Book::destroy($id);
        return response()->json("book deleted");
    }
}
