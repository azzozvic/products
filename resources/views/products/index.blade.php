@extends('products.layout')

@section('content')

<div class="jumbotron container">


    <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">create product</a>
    <a class="btn btn-primary btn-lg" href="{{route('products.trash')}}" role="button">trashed</a>
  </div>
  <div class="container">
      @if ($message=Session::get('success'))
      <div class="alert alert-primary" role="alert">
       {{$message}}
      </div>
      @endif

  </div>

  <div class="container">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">details</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>

              @php
                  $i=0;
              @endphp
           @foreach ($products as $item )
           <tr>
           <th scope="row">{{++$i}}</th>
           <td>{{$item->name}}</td>
           <td>{{$item->price}} SD</td>
           <td>{{$item->detail}}</td>
           <td>
            <div class="row">
                <div class="col-sm">
                    <a href="{{route('products.edit',$item->id)}}" class="btn btn-success">edit</a>
                </div>
                <div class="col-sm">
                    <a href="{{route('products.show',$item->id)}}" class="btn btn-primary">show</a>
                </div>

                <div class="col-sm">
                    <a href="{{route('soft.delete',$item->id)}}" class="btn btn-warning">softdelete</a>
                </div>

                <div class="col-sm">
                    <form action="{{route('products.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" class="btn btn-dander">delete</button>
                        </form>
                </div>
              </div>




           </td>
        </tr>
           @endforeach


        </tbody>
      </table>

      {!!$products->links()!!}
  </div>

@endsection
{{-- ['id'=>$item->id] --}}
