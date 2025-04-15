<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginas=$request->input('paginas');
        $search=$request->input('search');
        $productos=Product::whereRaw(' LOWER(name) like ?',['%'.strtolower($search).'%'])->orWhereRaw('LOWER(description) like ?',['%'.strtolower($search).'%'])->paginate($paginas);
        return view('products.index', ['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'name'=>'required|unique:products,name',
            'description'=>'required',
            'stock'=>'required|numeric|min:0',
            'brand'=>'required',
            'price'=>'required|numeric|min:0',
            'image'=>'required|file|max:2048',
            'category_id'=>'required|exists:categories,id'
        ],[
            'name.required'=>'El nombre es necesario',
            'description.required'=>'El campo descripcion es requerido'
        ]);
        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        if($request->hasFile('image')){
            $product->image=$request->file('image')->store('products');
        }
        $product->save();
        return redirect()->route('products.index')->with('success','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
