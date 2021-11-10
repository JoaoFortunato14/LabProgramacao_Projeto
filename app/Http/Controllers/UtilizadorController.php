<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('email')){
            $utilizadores=Utilizador::all();
            return view('ListUsers', ['utilizadores'=>$utilizadores]);
        }else{
            return redirect("/login");
        }
    }

    public function showinfo(){
        if(session()->has('email')){
            $infos=Utilizador::where('email','=',session()->get('email'))->get();
            return view('infoClient',['infos'=>$infos]);
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
        return view('registo');
    }
    
    public function validar_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'pass'=>'required'
        ]);
        
        if($request->get('email')=="admin@gmail.com" && $request->get('pass')=="adminadmin"){
            $request->session()->put('email',$request->get('email'));
            return redirect('/admin');
        }

        $utilizador = Utilizador::where('email','=',$request->get('email'))->first(); 
        if($utilizador && password_verify($request->get('pass'),$utilizador['pass']))
        {
            $request->session()->put('email',$request->get('email'));
            return redirect('/usersHome');
        }else{
            echo 'Password Errada';
            return redirect('/login');
        }
    }

    public function accessSessionData(Request $request){
        if($request->session()->has('email'))
        echo $request->session()->get('email');
     else
        echo 'No data in the session';
    }

    public function deleteSession(){
        session()->forget('email');
        return redirect('login');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email'=>'required|email',
            'name' => 'required',
            'lastname' => 'required',
            'birthDate'=>'required',
            'genre'=>'required',
            'NIF'=>'required|min:9|max:9|digits_between:1,9',
            'address'=>'required',
            'cp'=>'required|min:4|max:4|digits_between:1,9',
            'cp1'=>'required|min:3|max:3|digits_between:1,9',
            'pass1'=>'min:8|required_with:pass2|same:pass2',
            'pass2'=>'min:8'
        ]);
      

        $utilizador=new Utilizador;
        $utilizador->email=$request->email;

        $utilizador->pass=password_hash($request->pass1,PASSWORD_DEFAULT);
        $utilizador->FirstName=$request->name;
        $utilizador->LastName=$request->lastname;
        $utilizador->BirthDate=$request->birthDate;
        $utilizador->Genre=$request->genre;
        $utilizador->NIF=$request->NIF;
        $utilizador->Address=$request->address;
        $utilizador->CP=$request->cp."-".$request->cp1;
        $utilizador->save();


        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function show(Utilizador $utilizador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilizador $utilizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilizador $utilizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilizador $utilizador)
    {
        //
    }
}
