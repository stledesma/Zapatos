<?php

namespace App\Http\Controllers;

use App\Zapato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('shoes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')->get()->pluck('name_category', 'id');
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
        $data = $request->validate([
            'name' => 'required|min:7',
            'size' => 'required|min:5',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
        ]);

        DB::table('zapatos')->insert([
            'name' => $data['name'],
            'description' => $data['description']
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
