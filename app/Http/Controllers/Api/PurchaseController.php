<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Resources\PurchaseCollection;
use App\Http\Resources\PurchaseResource;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PurchaseCollection(Purchase::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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

        return response()->json(['success' => true, 'msg' => 'success', 'purchase' => new PurchaseResource($purchase)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PurchaseResource(Purchase::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->validated());
        return response()->json(['success' => true, 'msg' => 'success', 'purchase' => new PurchaseResource($purchase)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['success' => true, 'msg' => 'success'], 200);
    }
}
