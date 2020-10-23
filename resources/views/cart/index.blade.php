@extends('layouts.app')
@section('content')

    <h4>Your Cart</h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td scope="row">{{$item->name}}</td>
                    <td> ₱ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
                    <td>
                     <form action="{{route('cart.update',$item->id)}}">
                        <input name="quantity" type="number" value="{{$item->quantity}}">
                        <input type="submit" value="save">
                    </form>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger" href="{{route('cart.destroy',$item->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
       
        <div >
            <h4 style="font-weight: bold">Total Price: ₱ {{Cart::session(auth()->id())->getTotal()}}.00</h4>
        </div>

        <div>
           <a href="{{route('cart.checkout')}}" class="btn btn-primary">Checkout</a>
        </div>
    
@endsection