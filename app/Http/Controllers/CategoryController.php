<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(){
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function getCategoryById($id){
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function addForm(){
        return view('categories.addForm');
    }

    public function addCategory(Request $req){
        $req->validate([
            'name' => 'required|string|max:50',
        ]);
        $name = $req->name;

        Category::create(['name' => $name]);

        return redirect(route('categories.index'));
    }

    public function editForm($id){
        $category = Category::findOrFail($id);
        return view('categories.editForm', compact('category'));
    }

    public function editCategory($id, Request $req){
        $req->validate([
            'name' => 'required|string|max:50',
        ]);
        
        $category = Category::findOrFail($id);

        $category->name = $req->name;
        $category->save();

        return redirect(route('categories.show', $id));
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect(route('categories.index'));
    }
}
