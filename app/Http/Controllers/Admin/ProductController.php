<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::active()->paginate(2);
        return view('admin.products.index', ['products'=>$products]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'art' => 'required| unique:products,art| regex:/^[a-zA-Z0-9]+$/',
        ]);
       Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product добавлен!');
    }
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:10',
            'art' => 'required| unique:products,art| regex:/^[a-zA-Z0-9]+$/',
        ]);
        $product=Product::find($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with
        ('success','Изменения сохранены!');
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product удален');
    }
}
