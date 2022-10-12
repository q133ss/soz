<?php
namespace App\Services;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService{
    public static function getCategories(Request $request){
        if($request->filled('s')){
            return Category::where('name', 'LIKE', '%'.$request->s.'%')->get();
        }else{
            return Category::get();
        }
    }
}
