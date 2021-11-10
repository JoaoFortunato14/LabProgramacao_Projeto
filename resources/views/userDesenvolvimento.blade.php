@extends('layouts.app')

@section('title')
Laravel Programming Lab. | HomePage
@endsection

@section('navbar')
<link rel="stylesheet" href="{{ asset('css/css_header.css') }}">
<div id="section1">
  <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="logo-container col-auto">
          <a href="{{url('/home')}}" id="logo">
            <img src="images\Brand__Brand.jpg" width="200" height="40" alt="Brand&Brand logo" class="logo" >
          </a>
        </div>
      <div class="sb-example-1">
         <div class="search">
            <input type="text" class="searchTerm" placeholder="Pesquisar...">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
      </div>
    </nav>
  </div>
  
  <!--NAVBAR-->
  <div class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" id="section2">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Suplementação
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{url('/userSuplementacao')}}">Proteína</a>
          <a class="dropdown-item" href="{{url('/userDesenvolvimentoMuscular')}}">Desenvolvimento Muscular </a>
          <a class="dropdown-item" href="{{url('/userEnergia')}}">Energia e Resistência </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Acessórios</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Vestuário Desportivo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{url('/userVestuario')}}">Equipamento de Treino</a>
        <a class="dropdown-item" href="{{url('/userMalas')}}">Malas</a>
        </div>>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dicas nuticionais e mitos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('/clientinfo')}}">Informação do utilizador</a>
          <a class="dropdown-item" href="{{url('/clientOrders')}}">Orders</a>
          <a class="dropdown-item" href="{{url('/session/remove')}}">Terminar Sessão</a>
        </div>
      </li>
      <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
    </ul>
  </div>
</div>
  
@endsection('navbar')

@section('content')
<br>
<br>
<br>
<br>
<h2>Desenvolvimento Muscular</h2>
<br>
<div class="grid-container">

@forelse($desenvolvimentos as $desenvolvimento)
    <div class="card" id="section1">
    <form action="{{ url('/cartStore')}}" method="POST">
        
        <img src="{{asset('images/Suplementacao/'.$desenvolvimento->imagem)}}" alt="Proteina Whey" style="width:100%">
        <h1>{{$desenvolvimento->nome}}</h1>
        <p class="price">{{$desenvolvimento->preco}}&euro;</p>
        <p>{{$desenvolvimento->info}}</p>
        <input type="hidden" value="{{ $desenvolvimento->id }}" id="id" name="id">
        {{ csrf_field() }}
            <input type="hidden" value="{{ $desenvolvimento->nome }}" id="name" name="name">
            <input type="hidden" value="{{ $desenvolvimento->preco }}" id="price" name="price">
            <input type="hidden" value="{{ $desenvolvimento->imagem }}" id="imagem" name="imagem">
           <input type="hidden" value="1" id="quantity" name="quantity">
        <p><button>Adiciona ao carrinho</button></p>
       
    </div>
    </form>

    
    @empty
    <h5> No products for muscle development Found!</h5>
    @endforelse
</div>

@endsection('content')


@section('footer')
@include('includes.footer') 
@endsection('footer')