<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\itembrand;
use App\Models\itemcategory;

class ItemCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('items.index');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $itemcategory = new Itemcategory([

            'itemName' => $request->get('itemName'),

        ]);

        $itemcategory->save();

        if ($itemcategory->save()){

            $itembrand = new Itembrand([

                'brandName' => $request->get('brandName'),
                'stocks' => $request->get('stocks'),
                'price' => $request->get('price'),
                'lastPrice' => $request->get('lastPrice'),
                'itemCategory_id' => $itemcategory->id

            ]);

            $itembrand->save();

        }
        $itemcategory->save();
        return redirect()->route('item.index')->withStatus('item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return view('items.edit', compact('itembrand'));
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
        //

        // $user->update(
        //     $request->merge(['password' => Hash::make($request->get('password'))])
        //         ->except([$hasPassword ? '' : 'password']
        // ));

        // return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
