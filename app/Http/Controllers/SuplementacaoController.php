<?php

namespace App\Http\Controllers;

use App\Models\Suplementacao;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuplementacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('email')){
        $suplementos = Suplementacao::orderBy('created_at','desc')->paginate(5);
        return view('ListSuple',['suplementos'=>$suplementos]);
         }else{
            return redirect("/login");
         }
    }

    public function indexedit(){
        if(session()->has('email')){
        $suplementos = Suplementacao::orderBy('created_at','desc')->paginate(5);
        return view('ListEditSuple',['suplementos'=>$suplementos]);
    }else{
        return redirect("/login");
     }
    }

    public function proteina()
    {
        if(session()->has('email')){
        $proteinas = Suplementacao::where('category','=',"proteina")->get();
        return view('userSuplementacao',['proteinas'=>$proteinas]);
        }else{
            return redirect("/login");
        }
    }

    public function desenvolvimento(){
        if(session()->has('email')){
        $desenvolvimentos = Suplementacao::where('category','=',"desenvolvimentomuscular")->get();
        return view('userDesenvolvimento',['desenvolvimentos'=>$desenvolvimentos]);
        }else{
            return redirect("/login");
        }

    }
    public function energia(){
        if(session()->has('email')){
        $energias = Suplementacao::where('category','=',"energiaresistencia")->get();
        return view('energiaResistencia',['energias'=>$energias]);
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
            return view('adminCreateSuple');
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

        $suplemento= new Suplementacao;

        if($request->hasFile('file')){
            $random = Str::random(6);
            $file = $request->file('file');
            $extension=$file->getClientOriginalExtension();
            $filename=$random.'.'.$extension;
            $file->move(public_path('images/'),$filename);
            $suplemento->imagem = $filename;
        }

        $suplemento->category=$request->category;
        $suplemento->nome=$request->name;
        $suplemento->preco=$request->price;
        $suplemento->info=$request->info;
        $suplemento->stock=$request->stock;
        $suplemento->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplementacao  $suplementacao
     * @return \Illuminate\Http\Response
     */
    public function show(Suplementacao $suplementacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplementacao  $suplementacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplementacao $suplementacao)
    {
        if(session()->has('email')){
        return view('EditSuplementacao',['suplementacao'=>$suplementacao]);
        }else{
            return redirect("/login");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplementacao  $suplementacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required|max:100',
        'price'=>'required', 
        'info'=>'required',
        'stock'=>'required',
        'file'=>'required']);

        

        $suplemento = Suplementacao::findOrFail($id);

        if($request->hasFile('imagem')){
            $random = Str::random(6);
            $file = $request->file('imagem');
            $extension = $file->getClientOriginalExtension();
            $filename = $random.'.'.$extension;
            $file->move(public_path('images/'),$filename);
            $suplemento->imagem = $filename;
        }

        if($request->has('category')){
            $suplemento->category = $request->category;
        }

        $suplemento->nome = $request->name;
        $suplemento->info = $request->info;
        $suplemento->preco = $request->price;
        $suplemento->stock = $request->stock;
        $suplemento->save(); //Can be used for both creating and updating

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplementacao  $suplementacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplementacao $suplementacao)
    {
        $suplementacao->delete();
        return redirect('/admin');
    }
}
