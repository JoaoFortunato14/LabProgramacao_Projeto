<?php

namespace App\Http\Controllers;

use App\Models\Vestuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VestuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('email')){
        $vestuarios = Vestuario::orderBy('created_at','desc')->paginate(5);
        return view('ListVest',['vestuarios'=>$vestuarios]);
        }else{
            return redirect("/login");
        }
    }

    public function indexedit(){
        if(session()->has('email')){
        $vestuarios = Vestuario::orderBy('created_at','desc')->paginate(5);
        return view('ListEditVest',['vestuarios'=>$vestuarios]);
        }else{
            return redirect("/login");
        }
    }

    public function vestuario()
    {
        if(session()->has('email')){
        $vestuarios = Vestuario::where('category','=',"vesturario")->get();
        return view('userVestuario',['vestuarios'=>$vestuarios]);
        }else{
            return redirect("/login");
        }
    }

    public function malas(){
        if(session()->has('email')){
        $malas = Vestuario::where('category','=',"malas")->get();
        return view('userMalas',['malas'=>$malas]);
        }else{
            return redirect("/login");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('email')){
            return view('adminCreateVestuario');
        }else{
            return redirect("/login");
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|max:100',
        'price'=>'required', 
        'info'=>'required',
        'stock'=>'required',
        'file'=>'required']);

        $vestuario=new Vestuario;

        if($request->hasFile('file')){
            $random = Str::random(6);
            $file = $request->file('file');
            $extension=$file->getClientOriginalExtension();
            $filename=$random.'.'.$extension;
            $filename1=time();
            $file->move(public_path('images/'),$filename);
            $vestuario->imagem=$filename;
        }




        $vestuario->category=$request->category;
        $vestuario->nome=$request->name;
        $vestuario->preco=$request->price;
        $vestuario->tamanho=$request->size;
        $vestuario->info=$request->info;
        $vestuario->stock=$request->stock;
        $vestuario->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vestuario  $vestuario
     * @return \Illuminate\Http\Response
     */
    public function show(Vestuario $vestuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vestuario  $vestuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Vestuario $vestuario)
    {
        if(session()->has('email')){
        return view('EditVestuario',['vestuario'=>$vestuario]);
        }else{
         return redirect("/login");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vestuario  $vestuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required|max:100',
        'price'=>'required', 
        'tamanho'=>'required',
        'info'=>'required',
        'stock'=>'required',
        'file'=>'required']);

        $vestuario = Vestuario::findOrFail($id);

         

        if($request->has('category')){
            $vestuario->category = $request->category;
        }

        $vestuario->nome = $request->name;
        $vestuario->tamanho=$request->tamanho;
        $vestuario->info = $request->info;
        $vestuario->preco = $request->price;
        $vestuario->stock = $request->stock;
        $vestuario->save(); //Can be used for both creating and updating

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vestuario  $vestuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vestuario $vestuario)
    {
        $vestuario->delete();
        return redirect('/admin');
    }
}
