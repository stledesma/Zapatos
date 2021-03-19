<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Zapato;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;


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
        $userZapato = Auth::user()->userZapato;
        //$shoe = DB::table('zapatos')->select('zapatos.*')->get();
        /*$shoe = DB::table('zapatos')->join('category', 'category.id', '=', 'category_id')
                                    ->join('brand', 'brand.id', '=', 'brand_id')
                                    ->select('name_shoes', 'size_shoes', 'price_shoes', 'name_category', 'name_brand')
                                    ->get();
        //dd($shoe);*/
        return view('shoes.index')->with('userZapato', $userZapato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category = DB::table('category')->get()->pluck('name_category', 'id');
        //dd($category);
        $categorias = Categoria::all(['id','name_category']);
        $marcas = Marca::all(['id','name_brand']);
        return view('shoes.create')->with('categorias', $categorias)
                                   ->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$id_user = Auth::user()->id;
        $data = $request->validate([
            'name' => 'required|min:7',
            'size' => 'required|min:5',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'image'=>'required|image'
        ]);

        $rutaImagen = $request['image']->store('upload-zapatos','public');
        $imgResize = Image::make(public_path("storage/{$rutaImagen}"))->fit(1000,500);
        $imgResize->save();

        /*DB::table('zapatos')->insert([
            'name_shoes' => $data['name'],
            'size_shoes' => $data['size'],
            'price_shoes' => $data['price'],
            'user_id' => $id_user,
            'category_id' => $data['category'],
            'brand_id' => $data['brand'],
        ]);*/



        Auth::user()->userZapato()->create([
            'name_shoes' => $data['name'],
            'size_shoes' => $data['size'],
            'price_shoes' => $data['price'],
            'image' => $rutaImagen,
            'categoria_id' => $data['category'],
            'marca_id' => $data['brand'],
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
        return view('shoes.show')->with('zapatos', $zapato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function edit(Zapato $zapato)
    {
        $categorias = Categoria::all(['id','name_category']);
        $marcas = Marca::all(['id','name_brand']);
        return view('shoes.edit')->with('categorias',$categorias)
                                   ->with('marcas',$marcas)
                                   ->with('zapato', $zapato);
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
        $this->authorize('delete', $zapato);
        $data = $request->validate([
            'name' => 'required|min:7',
            'size' => 'required|min:5',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
        ]);

         //Asignar valores
         $zapato->name_shoes=$data['name'];
         $zapato->size_shoes=$data['size'];
         $zapato->price_shoes=$data['price'];
         $zapato->categoria_id=$data['category'];
         $zapato->marca_id=$data['brand'];
         $zapato->save();
         return redirect()->action('ZapatoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zapato $zapato)
    {
        //funcion para validar usuario usando policy
        $this->authorize('delete', $zapato);
         //metodo para eliminar
         $zapato->delete();
         return redirect()->action('ZapatoController@index');
    }
}
