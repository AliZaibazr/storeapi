<?php

namespace App\Http\Controllers\API\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->supplier = $request->get('supplier');
        
        if($product->save())
        {
            return response()->json($product);
        }
        return response('Product Not saved du to some reason');
        
    }
    
    public function update(Request $request)
    {
        $product = Product::where('id',$request->get('id'));
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->supplier = $request->get('supplier');
        
        if($product->save())
        {
            return response()->json("Product updated successfully",$product);
        }
        return response('Product Not updated due to some reason');

    }

    public function destroy(Request $request)
    {
        $product= Product::where('id',$request->get('id'));
        $product->delete();
    }
}
