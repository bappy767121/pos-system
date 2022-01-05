<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products']=Product::all();
        return view('products.products', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']=Category::arrayForSelect();
        $this->data['mode']         = 'create';
        $this->data['headline']     = 'Add New product';
        return view('products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data= $request->all();

        if(Product::create($data))
            {
                Session::flash('message', 'New Product Created Succesfully');
            }
        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']= Product::find($id);
        return view('products.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']         = Product::findOrFail($id);
        $this->data['categories']   = Category::arrayForSelect();
        $this->data['mode']         = 'edit';
        $this->data['headline']     = 'Update Information';

        return view('products.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data                  = $request->all();

        $product               = Product::find($id);
        $product->category_id  = $data['category_id'];
        $product->title       = $data['title'];
        $product->description  = $data['description'];
        $product->price        = $data['price'];
        $product->cost_price   = $data['cost_price'];
        if( $product->save() ) {
            Session::flash('message', 'Product Updated Successfully');
        }
        
        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Product::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully');
        }
        
        return redirect()->to('products');
    }
}
