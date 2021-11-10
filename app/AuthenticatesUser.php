<?php

namespace App;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Utilizador;
use App\Models\LoginToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class AuthenticatesUser
{
    use ValidatesRequests;

    protected $request;

    //construtor
    public function __construct(Request $request){
        $this->request= $request;
    }

    public function invite(){

        $this->validateRequest()
            ->createToken()
            ->send();
    }

    public function validateRequest()
    {
        $this->validate($this->request, [
            'email'=>'required|email|exists:utilizadors,email'
        ]);

        return $this;
    }

    public function createToken()
    {
        $utilizador= Utilizador::byEmail($this->request->email);
        
        return LoginToken::generateFor($utilizador);

    }

    
    
}