<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Topico;
use App\AppFunction;

class CategoriaController extends Controller
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
        $categorias = Categoria::All();
        return view('backoffice.categorias.categorias', compact('mode','categorias'));
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
        //$categorias = Categoria::All();
        $exist = Categoria::where('name',$request['name'])->first();
        if($exist != null)
        {
            return 'existe';
        }
        else
        {
            $categoria = new Categoria;
            $categoria->name = $request['name'];
            $categoria->description = $request['description'];
            $categoria->isActive = $request['isActive'];
            $categoria->isPrivate = $request['isPrivate'];
            $categoria->save();

            //return view('backoffice.categorias.categorias',compact('mode','categorias'));
            return redirect()->route('categorias.index');
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
        $categoria = Categoria::where('id',$id)->first();
        //dd($categoria);
        $categorias = Categoria::All();
        return view('backoffice.categorias.categorias', compact('mode','categoria','categorias'));
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
      $categorias = Categoria::All();
      $categoria = Categoria::find($id);
      $categoria -> fill($request->all());
      $categoria->save();
      return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect()->route('categorias.index');   
    }
}
