@extends('layouts.app')
@section('profilupdate')

<div class="container">
	
<a type="button" class="btn btn-warning" href="{{ route('item.index') }}">les items</a>
@if(count($errors)>0)
foreach($errors->all as $error)
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $error}}</strong>
</div>

@endif()



@if(session()->has('error'))

<div class="alert alert-danger" role="alert">
  {{ session()->get('error') }}
</div>

@endif()
<form  action="{{ route('update',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
  <div class="form-group">
    <label><h3>Item N°:</h3></label><br/>
    <label for="formGroupExampleInput">le mot de passe :</label>
    <input type="password" class="form-control" name="passwod" id="formGroupExampleInput"
     placeholder="******************"  >
  </div>
   <div class="form-group">

    <label for="formGroupExampleInput">Confirmation du mot de passe :</label>
    <input type="password" class="form-control" name="passwod1" id="formGroupExampleInput" 
    placeholder="******************">
  </div>
  


  <div class="form-group">
  	<button type="submit" class="btn btn-secondary">Modifier </button>

<button type="reset" class="btn btn-info">Annuler</button>
  	
  </div>
</form>
</div>

@endsection()