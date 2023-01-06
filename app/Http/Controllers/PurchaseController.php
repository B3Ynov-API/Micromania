<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Psy\Readline\Hoa\Console;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::has('products')->paginate(5);
        return view('purchases.index', compact('purchases'));
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
    public function store(Request $request)
    {
        $purchase = Purchase::make();
        $isThereValueIn = false;
        foreach($request->product_quantities as $quantity)
        {
            if($quantity != 0)
            {
                $isThereValueIn = true;
            }
        }
        if(!$isThereValueIn)
        {
            return redirect()->back();
        }

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
