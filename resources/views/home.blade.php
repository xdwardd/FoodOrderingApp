@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
      <h1>Food Master</h1>
      <p class="lead text-muted">Make Your Cravings Satisfied</p>
    
    </div>
  </section>
  <section>
      <div class="row">
          @foreach ($products as $product)
          <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img class="card-img-top" src="/default.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <h5 class="card-text">Price: ₱ {{$product->price}}</h5>
                </div>
                <div class="card-body">
                    <a href="{{route('cart.add', $product->id)}}" class="btn btn-lg btn-block btn-primary">  <i class="fas fa-shopping-cart text-white"></i> Add Cart</a>
              
                </div>
            </div>
          </div>
          @endforeach
        
      </div>
      <footer>
        <div class="text-center">
          <p>FoodMaster &copy;Edward Catapan, 2020</a>.</p>
          <div class="mb-4">
            <a href="#" style="padding-right: 1rem"><i class="fab fa-facebook-square fa-2x"></i></a> 
            <a href="#" style="padding-right: 1rem"><i class="fab fa-github fa-2x"></i></a> 
            <a href="#" style="padding-right: 1rem"><i class="fab fa-twitter fa-2x"></i></a>
          </div>
         
        </div>
    </footer>
  </section>
@endsection
