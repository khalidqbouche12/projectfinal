@extends('layouts.app')
@section('profil')
<div class="container">
	@if(session()->has('success'))

<div class="alert alert-success" role="alert">
  {{ session()->get('success') }}
</div>


@endif()
	<h3>les données personnels</h3>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Nom d'utilisateur :
    <span class="badge badge-primary badge-pill">{{ $user->name}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    email :
    <span class="badge badge-primary badge-pill">{{ $user->email }}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    mot de passe 
    <span > <a  href="{{ route('modifier',['id'=>Auth::user()->id]) }}">modifiez le mot passe</a></span>
  </li>
</ul>	
</div>

@endsection()