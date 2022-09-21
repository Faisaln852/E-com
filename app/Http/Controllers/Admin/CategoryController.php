<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('slug'));
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->papular = $request->input('papular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect('categories')->with('status', "Category add successfully");
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = ('assets/uploads/category/' . $category->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $category->delete();
            return redirect()->back()->with('status', "Category Deleted successfully");
        }
    }

    public function deletecategory(Request $request)
    {
        $category_id = $request->input('cat_id');
        // code for deleting products  and images of those products which where belonging to that category
        if (Category::where('id', $category_id)->exists()) {
            if (Product::where('cate_id', $category_id)->exists()) {
                $delete_products = Product::where('cate_id', $category_id)->get();
                foreach ($delete_products as $delete_products) {
                    if ($delete_products->image) {
                        $path = ('assets/uploads/products/' . $delete_products->image);
                        if (File::exists($path)) {
                            File::delete($path);
                        }
                        $delete_products->delete();
                    }
                }
            }
            //code for deleteing the category and its image
            $categoryItems = Category::where('id', $category_id)->first();
            if ($categoryItems->image) {
                $path = ('assets/uploads/category/' . $categoryItems->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $categoryItems->delete();
            return response()->json(['status' => " Category Deleted Successfully "]);
        }
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('slug'));
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->papular = $request->input('papular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');

        if ($request->hasFile('image')) {

            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->update();
        return redirect('categories')->with('status', "Category updated successfully");
    }
}
