<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(5);

        $stripe = new \Stripe\StripeClient(
            'sk_test_51Ko4AEBCYBZIkEQTCzjO4ZFNMvK5tByPD0iOkH0c0JEvFzHXAnuz8nzPt5l1wqbUPlqFxxoM1PEoqzRO1de9t6mh00NbrEU74C'
        );

        $productStripe = $stripe->products->all(['limit' => 1]);
        
        $product = DB::table('products')->orderBy('id', 'desc')->first();

        // if there is no product in the database, show an error
        if ($product == null) {
            return view('products.index', compact('data'));
        }
        
        return view('products.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function sell()
    {
        $data = Product::latest()->paginate(5);

        return view('products.sell', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function hire()
    {
        $data = Product::latest()->paginate(5);

        return view('products.hire', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::get();

        return view('products.add', compact('categories'));
    }

    function createUrlSlug($urlString)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51Ko4AEBCYBZIkEQTCzjO4ZFNMvK5tByPD0iOkH0c0JEvFzHXAnuz8nzPt5l1wqbUPlqFxxoM1PEoqzRO1de9t6mh00NbrEU74C'
        );

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'bricks_amount' => 'required',
            'set_number' => 'required',
            'category' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'security_stock' => 'required',
            'barcode' => 'required',
            'spotlight' => 'required',
            'thumbnail' => 'required',
        ]);

        $product = new Product;

        // store the thumbnail in the database
        $path = $request->file('thumbnail')->store('/images/resource', ['disk' => 'my_files']);
        $product->thumbnail = $path;

        foreach ($request->file('images') as $imagefile) 
        {     
            $image = new Image;
            $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
            $image->url = $path;
            $image->product_id = $product->id;
            $image->save();
        }

        // slugify the name and store it in the database
        $product->slug = $this->createUrlSlug($request->name);
        $product->fill($request->all());
        $product->save();


        $stripe->products->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // add product from stripe to database
        $productStripe = $stripe->products->all(['limit' => 1]);

        DB::table('products')
            ->where('id', $product->id)
            ->update(['prod_id' => $productStripe->data[0]->id]);

        // add price from stripe to database
        $priceStripe = $stripe->prices->create([
            'unit_amount' => $request->price * 100,
            'currency' => 'eur',
            'billing_scheme' => 'per_unit',
            'product' => $productStripe->data[0]->id,
        ]);

        DB::table('products')
            ->where('id', $product->id)
            ->update(['price_id' => $priceStripe->id]);

        // add price from stripe to database
        $stripe->products->update(
            $productStripe->data[0]->id,
            ['default_price' => $priceStripe->id],
        );

        return redirect()->route('products.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'bricks_amount' => 'required',
            'set_number' => 'required',
            'category' => 'required',
            'price' => 'required',
            'max_weeks' => '',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'spotlight' => 'required',
            'voorraad' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
