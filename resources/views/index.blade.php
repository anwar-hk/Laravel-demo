@extends('layouts.frontLayout.front_design')
@section('content')

<section id="slider">  
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <img src="{{url('images/frontend_img/banners/banner-1.jpg')}}"  width="153%" alt="">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            @include('layouts.FrontLayout.front_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Display Products</h2>
                    @foreach($productsAll as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('images/backend_img/products/small/'.$product->image)}}" alt="" />
                                <h2>Rs {{$product->price}}</h2>
                                <p>{{$product->product_name}}</p>
                                <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart">Detail Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--features_items-->
                {{ $productsAll->links() }}
            </div>
        </div>
    </div>
</section>

@endsection