@extends('layouts.app')

@section('title')
Laravel Programming Lab. | AdminHomePage Suplementation
@endsection

@section('navbar')
<link rel="stylesheet" href="{{ asset('css/css_header.css') }}">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/admin')}}">Admin Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Create
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('/adminCreateSuple')}}">Create Supplementation</a>
          <a class="dropdown-item" href="{{url('/adminCreateVest')}}">Create Clothing</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('/FormsEditarSuple')}}">Edit Supplementation</a>
          <a class="dropdown-item" href="{{url('/FormsEditarVest')}}">Edit Clothing</a>
          <a class="dropdown-item" href="{{url('/suplementos')}}">View Suplementation</a>
          <a class="dropdown-item" href="{{url('/vestuarios')}}">View Clothes</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/users">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/orders')}}">Orders</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/session/remove')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>
@endsection('navbar')

@section('content')
<div class="container">
<form action="{{url('/EditSuple/'.$suplementacao->id)}}" method= "post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputCourse">Category:</label>
        <select id="course" name="category" value="{{$suplementacao->category}}">
            <option value="proteina"selected>Proteina</option>
            <option value="desenvolvimentomuscular">Desenvolvimento Muscular</option>
            <option value="energiaresistencia">Energia e Resistência</option>
            <option value="acessorios">Acessórios</option>
        </select>
    </div>
    <div class="form-group">
      <label for="exampleInputName">Nome do produto:</label>
      <input type="text" placeholder="Enter the name" name="name" value="{{$suplementacao->nome}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPrice">Preço:</label>
      <input type="text" placeholder="Enter the price" name="price" value="{{$suplementacao->preco}}" class="form-control" id="exampleInputPrice" aria-describedby="priceHelp">
    </div>    
    <div class="form-group">
      <label for="exampleInputInfo">Info:</label>
      <input type="text" placeholder="Enter info about the product" name="info" value="{{$suplementacao->info}}" class="form-control" id="exampleInputInfo" aria-describedby="infoHelp">
    </div> 
    <div class="form-group">
      <label for="exampleInputStock">Stock:</label>
      <input type="integer" placeholder="Enter the stock about the product" name="stock" value="{{$suplementacao->stock}}" class="form-control" id="exampleInputStock" aria-describedby="stockHelp">
    </div>  
    <div class="form-group">
        <label for="exampleInputFile">Image File</label>
        <input type="file" name="file" value="{{$suplementacao->imagem}}" class="form-control" id="exampleInputFile">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    </div>

    @if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection


@section('footer')
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        BRAND & BRAND
    </div>
</footer>
@endsection('footer')