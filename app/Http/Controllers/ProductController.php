<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation;

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
        $request->validate([
            'name'=>'required|unique:products,name',
            'description'=>'required',
            'stock'=>'required|numeric|min:0',
            'brand'=>'required',
            'price'=>'required|numeric|min:0',
            'image'=>'required|file|extensions:jpg,jpeg,png,gif',
            'category_id'=>'required|exists:categories,id'
        ],[
            'image.extensions'=>'El archivo debe ser de tipo: jpg, jpeg, png, gif',
        ],[
            'name'=>'Nombre',
            'description'=>'Descripción',
            'stock'=>'Stock',
            'brand'=>'Marca',
            'price'=>'Precio',
            'image'=>'Imagen',
            'category_id'=>'Categoría'
        ]);

        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->brand=$request->input('brand');
        $product->price=$request->input('price');
        if($request->hasFile('image')){
            $product->image=$request->file('image')->store('products','public');
        }
        $product->category_id=$request->input('category_id');

        $product->save();
        return redirect()->route('products.index')->with('success','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|unique:products,name',
            'description'=>'required',
            'stock'=>'required|numeric|min:0',
            'brand'=>'required',
            'price'=>'required|numeric|min:0',
            'image'=>'required|file|image|extensions:jpg,jpeg,png',
            'category_id'=>'required|exists:categories,id'
        ],[
        ],[
            'name'=>'Nombre',
            'description'=>'Descripción',
            'stock'=>'Stock',
            'brand'=>'Marca',
            'price'=>'Precio',
            'image'=>'Imagen',
            'category_id'=>'Categoría'
        ]);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->brand=$request->input('brand');
        $product->price=$request->input('price');
        if($request->hasFile('image')){
            $product->image=$request->file('image')->store('products','public');
        }
        $product->category_id=$request->input('category_id');

        $product->save();
        return redirect()->route('products.index')->with('success','Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Producto eliminado correctamente');
    }
}
