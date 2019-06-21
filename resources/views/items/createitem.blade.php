@extends('layouts.app')
@section('createitem')
<div class="container">

<a type="button" class="btn btn-warning" href="{{ route('item.index') }}">les items</a>

<form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="formGroupExampleInput">le titre :</label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Example input">
  </div>
  

  <div class="form-group">
    <label for="exampleFormControlFile1">Selectionnez une image !</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">description</label>
    <textarea  class="form-control" name="body" id="formGroupExampleInput2" placeholder="Another input"></textarea>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-secondary">Ajouter </button>

<button type="reset" class="btn btn-info">Annuler</button>
  	
  </div>
</form>
   

</div>


@endsection()