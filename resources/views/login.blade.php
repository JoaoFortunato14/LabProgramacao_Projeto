@extends('layouts.app')

@section('title')
Laravel Programming Lab. | SignIn Page
@endsection

@section('navbar')
@include('includes.header')
@endsection('navbar')

@section('content')
<div class="container">
    <form method= "post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail">Email:</label>
      <input type="text" placeholder="Enter the email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password:</label>
        <input type="password" placeholder="Enter the Password" name="pass" class="form-control" id="exampleInputPassword">
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