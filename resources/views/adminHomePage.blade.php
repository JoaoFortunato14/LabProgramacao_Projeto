@extends('layouts.app')

@section('title')
Laravel Programming Lab. | AdminHomePage
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
        <a class="nav-link" href="{{url('/users')}}">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/orders')}}">Orders</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/session/remove')}}">Logout</a>
    </ul>
  </div>
</nav>
@endsection('navbar')

@section('content')

<div class="logo-container col-auto" >

          <a href="" id="logo">
         
            <img src="images\Brand__Brand.jpg" alt="Brand&Brand logo" class="logo" >
          </a>
        </div>
@endsection('content')



@section('footer')
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        BRAND & BRAND
    </div>
</footer>
@endsection('footer')



