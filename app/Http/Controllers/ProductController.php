<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        if ($product->prod_id == null) {

            DB::table('products')
                ->where('id', $product->id)
                ->update(['prod_id' => $productStripe->data[0]->id]);

            $stripe->prices->create([
                'unit_amount' => $product->price * 100,
                'currency' => 'eur',
                'billing_scheme' => 'per_unit',
                'product' => $productStripe->data[0]->id,
            ]);
        }

        if ($product->price_id == null) {
            $productStripe = $stripe->products->all(['limit' => 1]);

            $priceStripe = $stripe->prices->all(['limit' => 1]);

            DB::table('products')
                ->where('id', $product->id)
                ->update(['price_id' => $productStripe->data[0]->default_price]);

            $stripe->products->update(
                $productStripe->data[0]->id,
                ['default_price' => $priceStripe->data[0]->id],
            );
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
        return view('products.add');
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

        // dd($request->all());

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
            'image_thumbnail' => 'required',
            'spotlight' => 'required',
            'voorraad' => 'required',
        ]);

        $input = $request->all();
        if ($request->hasFile('image_thumbnail')) {
            $destination_path = 'public/images/products';
            $image_thumbnail = $request->file('image_thumbnail');
            $image_thumbnail_name = $image_thumbnail->getClientOriginalName();
            $image_thumbnail_path = $request->file('image_thumbnail')->storeAs($destination_path, $image_thumbnail_name);
            // $input = $request->input('name');
        }

        // @dd($input);
        $product = new Product();

        $product->image_thumbnail = $image_thumbnail_name;
        $product->fill($request->all());

        $product->save();

        $stripe->products->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

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
        return view('products.edit', compact('product'));
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
            'max_weeks' => 'required',
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
