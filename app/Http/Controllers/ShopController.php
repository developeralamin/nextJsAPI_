<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Shop::all();

        return ShopResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRequest $request)
    {
       $data =  $request->all();

       if($request->file('photo')){
        $data['photo'] = Storage::putFile('shop/photo', $request->file('photo'));
       }
 
       $shop = Shop::create($data);

       return new ShopResource($shop);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::findOrFail($id);

        return new ShopResource($shop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopRequest $request, string $id)
    {
        $data = $request->all();
        $shop = Shop::findOrFail($id);
        
        if ($request->file('photo')) {
            if ($shop->photo) {
                Storage::delete($shop->photo);
            }
            $data['photo'] = Storage::putFile('shop/photo', $request->file('photo'));
        }
        $shop->update($data);

        return $this->success('Shop Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shop::findOrFail($id);
        if ($shop->photo) {
            Storage::delete($shop->photo);
        }
        $shop->delete();

        return $this->success('shop deleted successfully');
    }
}
