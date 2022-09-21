<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::where('status', '0')->get();
        return view('admin.product.index', compact('product', 'category'));
    }


    public function addProduct()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.product.add-product', compact('category'));
    }
    public function insert(Request $request)
    {
        $product = new Product();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $product->image = $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('slug'));
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        return redirect('products')->with('status', "Product added Successfully");
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product', 'category'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasfile('image')) {
            $path = ('assets/uploads/products/' . $product->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('slug'));
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->update();
        return redirect('products')->with('status', "Product updated successfully");
    }

    public function deleteproduct(Request $request)
    {

        $prod_id = $request->input('prod_id');
        if (Product::where('id', $prod_id)->exists()) {
            $productItem = Product::where('id', $prod_id)->first();
            if ($productItem->image) {
                $path = ('assets/uploads/products/' . $productItem->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $productItem->delete('id');
            return response()->json(['status' => " Product Deleted Successfully "]);
        }
    }

    /* public function delete($id) <!--with laravel-->
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = ('assets/uploads/products/' . $product->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect()->back()->with('status', "Product Deleted Successfully");
    }*/
}
