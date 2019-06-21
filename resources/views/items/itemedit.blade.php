@extends('layouts.app')
@section('edititem')
<h2>edit itme</h2>
<div class="container">

<a type="button" class="btn btn-warning" href="{{ route('item.index') }}">les items</a>

<form  action="{{ route('item.update',['id'=>$item->id]) }}" method="post" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
  <div class="form-group">
    <label><h3>Item N°: {{ $item->id }}</h3></label><br/>
    <label for="formGroupExampleInput">le titre :</label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Example input" value="{{ $item->title }}">
  </div>
  

  <div class="form-group">
    <label for="exampleFormControlFile1">Selectionnez une image !</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" >
   
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">description</label>
    <textarea  class="form-control" name="body"  id="formGroupExampleInput2" placeholder="Another input">{{ $item->body }}</textarea>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-secondary">Modifier </button>

<button type="reset" class="btn btn-info">Annuler</button>
  	
  </div>
</form>
</div>

@endsection()