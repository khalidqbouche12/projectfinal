@extends('layouts.app')
@section('deletesoft')

<div class="container">
<a type="button" class="btn btn-warning" href="{{ route('item.index') }}">list des items </a><br/>
  @foreach( $datadeletes as $data)
<h2>Les items supprimées  </h2>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $data->title }}</h5>
        <p class="card-text">{{ $data->body }}.</p>
        <img src="{{ asset('images/'.$data->image) }}" style="height: 120px">
        <br/><br/>
       
      </div>
    </div>
  </div>
  
</div>	

@endforeach()
</div>



@endsection()