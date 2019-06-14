<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function __construct()
    {
      
      

    }

    public function index()
    {
     

         $categories = Category::where('name','LIKE','%'.request('q').'%')
                  ->orderBy('id','DESC')
                  ->paginate(5);
                  return $categories;
    }

    public function all()
    {
        $categories = Category::all();
        $categories = $categories->chunk(round($categories->count() / 2));
        return $categories;
    }

    public function list()
    {
        return Category::orderBy('id','DESC')->get();

    } 

    public function store()
    {
            request()->validate([
              'name'=>'required'
            ]);

           $category = new Category(request()->all());
           $category->slug = str_replace(' ','_', request('name'));
           $category->save();
           return response()->json([
            'status'=>'success',
            'message'=>'Add Category Successfully'
          ]);
    }

    public function show(Category $category){

        return $category;
    }

    public function destroy(Category $category){

         $category->delete();
          return response()->json([
            'status'=>'success',
            'message'=>'Delete Category Successfully'
          ]);
    }

    public function edit(Category $category){
        return $category;
    }

    public function update(Category $category){
        request()->validate([
              'name'=>'required'
            ]);
        $category->name = request('name');
        $category->slug = str_replace(' ', '-',request('name'));
        $category->update();
         return response()->json([
            'status'=>'success',
            'message'=>'Update Category Successfully'
          ]);
    }
}
