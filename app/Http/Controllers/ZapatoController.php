<?php

namespace App\Http\Controllers;

use App\Zapato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class ZapatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$shoe = DB::table('zapatos')->select('zapatos.*')->get();
        $shoe = DB::table('zapatos')->join('category', 'category.id', '=', 'category_id')
                                    ->join('brand', 'brand.id', '=', 'brand_id')
                                    ->select('name_shoes', 'size_shoes', 'price_shoes', 'name_category', 'name_brand')
                                    ->get();
        //dd($shoe);
        return view('shoes.index')->with('shoe', $shoe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')->get()->pluck('name_category', 'id');
        //dd($category);
        $brand = DB::table('brand')->get()->pluck('name_brand', 'id');
        return view('shoes.create')->with('category', $category)
                                   ->with('brand', $brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $data = $request->validate([
            'name' => 'required|min:7',
            'size' => 'required|min:5',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
        ]);


        DB::table('zapatos')->insert([
            'name_shoes' => $data['name'],
            'size_shoes' => $data['size'],
            'price_shoes' => $data['price'],
            'user_id' => $id_user,
            'category_id' => $data['category'],
            'brand_id' => $data['brand'],
        ]);

        return redirect()->action('ZapatoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function show(Zapato $zapato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function edit(Zapato $zapato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zapato $zapato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zapato $zapato)
    {
        //
    }
}
