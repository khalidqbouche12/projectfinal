@extends('layouts.app')

@section('content')
<div class="container">
  @auth

<a type="button" class="btn btn-success" href="{{ route('item.create') }}">Ajouter nouveau item</a>

  <a type="button" class="btn btn-warning" href="{{  route('deletes') }}">les items suprimées</a>
@endauth()

  <div class="text-right">
   
</div>
    <div >
        <div >
            <div>
                <div class="card-header">Les items :</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


          <div class="row">
 
 @foreach($items as $item)
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $item->title }} </h5>
        <p class="card-text">
          <img src="{{ asset('images/'.$item->image) }}" style="height: 120px">
        </p>
        
         <a href="{{ route('item.show',['id'=> $item->id ]) }}" class="btn btn-primary">
            plus details</a>
        @if(Auth::id() ==$item->user_id)

  <div class="glyphicon-align-right">
            <a  href="/item/{{ $item->id }}/edit" class="btn btn-warning">modifer</a>
        
            <br/>
            <br/>
          <form action="{{ route('item.destroy',['id'=>$item->id]) }}"  method="POST">
             {{ method_field('DELETE') }}
        {{ csrf_field() }}
          <button type="submit">
            supprimer
          </button>
        
      </div>
        @endif()
    
        
      </form>
      <br/>
      <span>le nom d utilisateur est :{{ $item->user->name }}</span>
    
      </div>
    </div>
    <br/>
  </div> 
    @endforeach()

   </div>
                </div>
            </div>

        </div>
         {{ $items->links() }}
    </div>
</div>
@endsection
