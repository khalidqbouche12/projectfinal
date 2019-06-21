@extends('layouts.app')
@section('showitems')

<div class="container">
@if(session()->has('success'))

<div class="alert alert-success" role="alert">
  {{ session()->get('success') }}
</div>


@endif()
<div class="text-right">
	 

<a type="button" class="btn btn-success" href="{{ route('item.create') }}">Ajouter nouveau item</a>

	<a type="button" class="btn btn-warning" href="/softedelete">les items suprimées</a>
</div>


<br/>
<div class="row">	

  @foreach($items as $item)
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $item->title }} </h5>
        <p class="card-text">
        	<img src="{{ asset('images/'.$item->image) }}" style="height: 120px">
        </p>
        
        
      <div class="glyphicon-align-right">
      	
        <a href="{{ route('item.show',['id'=> $item->id ]) }}" class="btn btn-primary">
        plus details</a>
        @if(Auth::id()==$item->user_id)
        <a  href="/api/item/{{$item->id}}/edit" class="btn btn-warning">modifer</a>
        <br/>
        <br/>
      <form action="{{ route('item.destroy',['id'=>$item->id]) }}"  method="POST">
      	 {{ method_field('DELETE') }}
    {{ csrf_field() }}
      <button type="submit">
      	supprimer
      </button>
      	
      </div>
      	
      </form>
      @endif()
      
     	
		    
		   
        	
		
      </div>
    </div>
    <br/>
  </div> 
  <br/>
  @endforeach()

  <br/>
</div>
 {{ $items->links() }}
</div>
  

</div>


@endsection()

