@extends('layouts.app')
@section('oneitem')
<div class="container">
 
@if(session()->has('modifier'))
<div class="alert alert-success" role="alert">
  {{ session()->get('modifier') }}
</div>

@endif()
<a type="button" class="btn btn-warning" href="{{ route('item.index') }}">les items</a><br/><br/>
<div class="card text-center">
  <div class="card-header">
   Item N ° : {{ $items->id }}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $items->title }}</h5>
    <p class="card-text">
      <img src="{{ asset('images/'.$items->image) }}" style="height: 300px"><br/>
      {{ $items->body }}
  
    .</p>
    
  </div>
  <div class="card-footer text-muted">
    {{ $items->updated_at }}
  </div>
</div>
 
</div>
@endsection()