<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index(){
        $books = Book::orderBy('id', 'DESC')->paginate(6);
        // $books = Book::select('title', 'desc')->get();
        // $books = Book::where('id', '=', 1)->get();
        // $books =  Book::select('title', 'desc')->where('id', '=', 1)->get();
        // $books = Book::select('title', 'desc')->where('id', '=', 1)->orderBy('id', 'DESC')->get();   
        return view('books.index', compact('books'));
    }

    public function show($id){
        // $book = Book::where('id', '=', $id)->first();
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function createForm(){
        $categories = Category::select('id', 'name')->get();
        return view('books.create', compact('categories'));
    }

    public function somthing(){
        return view('books.somthing');
    }

    public function storeBook(Request $req){

        $req->validate([
            'title' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'image|mimes:jpg,png,jpeg',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id'
        ]);

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

        return redirect(route('books.index')); 
    }

    public function editBook($id){
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function updateBook($id, Request $req){

        $req->validate([
            'title' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

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


        $book->title = $req->title;
        $book->desc = $req->desc;
        $book->img = $name;

        $book->save();

        return redirect(route('books.show', $id));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);
        if($book->img !== null){
            unlink(public_path('uploads/books/') . $book->img);
        }
        Book::destroy($id);
        return redirect(route('books.index'));
    }
}