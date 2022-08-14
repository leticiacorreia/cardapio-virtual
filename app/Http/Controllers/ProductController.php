<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('establishment_id', \Auth::user()->establishment_id)
          ->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['establishment_id'] = \Auth::user()->establishment_id;

        //formatando preço para centavos
        $data['price_cents'] = (int)($data['price'] * 100);

        //salvando imagem em disco...
        $product = Product::create($data);

        if($request->hasFile('image')) {
          $imageFile = $request->file('image');

          $product->update([
            'image_path' =>  $imageFile->storeAs(
              "images/products/$product->id",
              'image.jpg',
              'public',
            )
          ]);
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        //transforma o preço em centavos.
        $data['price_cents'] = (int)($data['price'] * 100);

        if($request->hasFile('image')) {
          $imageFile = $request->file('image');

          $data['image_path'] = $imageFile->storeAs(
            "images/products/$product->id",
            'image.jpg',
            'public'
          );
        }
        $product->update($data);

        return redirect()->route('product.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
