@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;"> <!--form-->
    <div class="container">
    <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Check Out</li>
            </ol>
    </div>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_error') }}</strong>
    </div>
    @endif
    <form action="{{url('/checkout')}}" method="POST"> {{csrf_field()}}
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="signup-form"><!--sign up form-->
                    <h2>Delivery Address</h2>
                <div class="form-group">
                    <input type="text" name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @endif placeholder="Shipping Name" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="text" name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @endif placeholder="Shipping Address" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="text" name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @endif placeholder="Shipping City" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="text" name="shipping_state" id="shipping_state" @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @endif placeholder="Shipping State" class="form-control"/>
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <input type="text" name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @endif placeholder="Shipping Pincode" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="text" name="shipping_mobile" id="shipping_mobile" @if(!empty($shippingDetails->mobile)) value="{{$shippingDetails->mobile}}" @endif placeholder="Shipping Mobile" class="form-control"/>
                </div>
                <button type="submit" class="btn btn-mini check_out">CheckOut</button>
                </div><!--/sign up form-->
            </div>
        </div>
    </form>
    </div>
</section><!--/form-->

@endsection