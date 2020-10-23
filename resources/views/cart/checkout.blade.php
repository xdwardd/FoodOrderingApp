@extends('layouts.app')
@section('content')
 
    <h2 style="font-weight: bold">
        Checkout
    </h2>
    <h3>Shipping Information</h3>


    <form action="{{route('orders.store')}}" method="POST">
        @csrf
        <div class="form group">
            <label for="">Fullname</label>
            <input type="text" name="shipping_fullname" class="form-control">
        </div>

        <div class="form group">
            <label for="">City</label>
            <input type="text" name="shipping_city" class="form-control">
        </div>

        <div class="form group">
            <label for="">Zip</label>
            <input type="text" name="shipping_zipcode" class="form-control">
        </div>

        <div class="form group">
            <label for="">Full Address</label>
            <input type="text" name="shipping_address" class="form-control">
        </div>

        <div class="form group">
            <label for="">Mobile</label>
            <input type="text" name="shipping_phone" class="form-control">
        </div>


        <div class="mt-2">
            <i>Cash_on_delivery</i><br>
            <button type="submit" class="btn btn-primary">Place Order</button> 

        </div>

    </form>

 
            
@endsection