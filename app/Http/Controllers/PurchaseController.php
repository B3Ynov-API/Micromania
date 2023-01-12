<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterPurchaseRequest;
use App\Http\Requests\StorePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Psy\Readline\Hoa\Console;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PurchaseController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Purchase::class, 'purchase');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterPurchaseRequest $request)
    {
        $products = Product::all();

        $purchases = Purchase::has('products')->filter()->paginate(5);
        return view('purchases.index', compact('purchases', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('purchases.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::make();

        $purchase->save();
        $i = 0;
        foreach($request->product_quantities as $quantity)
        {
            if ($quantity != 0)
            {
                $purchase->products()->attach($request->product_ids[$i], ['quantity' => $quantity]);
            }
            $i = $i + 1;
        }

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchases
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return route('purchases.edit', compact('$purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchases
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        Product::destroy($purchase->id);
        return redirect()->route('purchases.index');
    }
}
