@extends('layouts.app')

@section('title')
Laravel Programming Lab. | SignUp Page
@endsection

@section('navbar')
@include('includes.header')
@endsection('navbar')


@section('content')

<div class="container">
    <form action="{{url('/registo')}}" method= "post">
      @csrf
    <div class="form-group">
      <label for="exampleInputEmail">Email:</label>
      <input type="text" placeholder="Enter the email" name="email" values="{{ old('email') }}" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
     
    </div>
    <div class="form-group">
      <label for="exampleInputName">First Name:</label>
      <input type="text" placeholder="Enter your first name" name="name" values="{{ old('name') }}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
     
    </div>
    <div class="form-group">
        <label for="exampleInputLastName">Last Name:</label>
        <input type="text" placeholder="Enter your last name" name="lastname" values="{{ old('lastname') }}" class="form-control" id="exampleInputLastName">
        
    </div>
    <div class="form-group">
        <label for="exampleInputNascimento">Birth Date:</label>
        <input type="date" placeholder="Enter your birth date" name="birthDate" class="form-control" id="exampleInputBirthDate">
        
    </div>
    <div class="form-group">
  <label for="exampleInputGenre">Your Genre:</label><br>
  <input type="radio" id="male" name="genre" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="genre" value="female">
  <label for="female">Female</label><br>
  </div> 
  <div class="form-group">
      <label for="exampleInputNIF">NIF:</label>
      <input type="text" placeholder="Enter your NIF" name="NIF" values="{{ old('NIF') }}" class="form-control" id="exampleInputNIF">
 </div>
  
  <div class="form-group">
        <label for="exampleInputAddress">Address:</label>
        <input type="text" placeholder="Enter your Address" name="address" values="{{ old('address') }}" class="form-control" id="exampleInputAddress">
        
  </div>
   <div class="form-group">
        <label for="exampleInputCP">Postal Code:</label>
        <input type="text" placeholder="xxxx" name="cp" size="4" maxlenght="4" class="form-group" id="exampleInputCP">
        <input type="text" placeholder="xxx" name=cp1 size="3" maxlenght="3" class="form-group" id="exampleInputCP1">
        
   </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password:</label>
        <input type="password" placeholder="Enter the Password" name="pass1" class="form-control" id="exampleInputPassword">
       
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Repita a sua Password:</label>
        <input type="password" placeholder="Enter the same Password" name="pass2" class="form-control" id="exampleInputPassword">
        
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