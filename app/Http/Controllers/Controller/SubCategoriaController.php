<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Session;

class SubCategoriaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $mode = 'New';
        $subcategorias = SubCategoria::All();
        $categorias = Categoria::pluck('name','id');
        return view('backoffice.subcategorias.subcategorias', compact('mode','subcategorias','categorias'));    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mode = 'New';
        $exist = SubCategoria::where('name',$request['name'])->where('categoria_id',$request['categoria_id'])->first();
        //dd($exist);
        if($exist != null)
        {
            Session::flash('error','SubCategory exist');
            return redirect()->route('subcategorias.index');
        }
        else
        {
            $subcategoria = new SubCategoria;
            $subcategoria->name = $request['name'];
            $subcategoria->description = $request['description'];
            $subcategoria->categoria_id = $request['categoria_id'];
            $subcategoria->isActive = $request['isActive'];
            $subcategoria->isPrivate = $request['isPrivate'];
            $subcategoria->qtTopics = 0;
            $subcategoria->qtMessages = 0;
            $subcategoria->save();

            Session::flash('success','SubCategory saved');
            return redirect()->route('subcategorias.index');

        }
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
        $mode = 'Edit';
        $subcategoria = SubCategoria::where('id',$id)->first();
        $subcategorias = SubCategoria::All();
        $categorias = Categoria::pluck('name','id');
        return view('backoffice.subcategorias.subcategorias', compact('mode','subcategoria','subcategorias','categorias'));

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategoria::destroy($id);
        return redirect()->route('subcategorias.index');
    }
}
