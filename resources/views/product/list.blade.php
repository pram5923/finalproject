@extends('layouts.homepage')

<body>
    <div class="main">
        @section('content')
        <div class="grid-container">
            @foreach($products as $product)
            <div class="grid-item">
                <div class="box-up">
                    <img class="product-img" src="{{ asset('images/products/'.$product['code'].'.jpg')}}" />
                    <div class="product-text">
                        <div class="info-inner">
                            <h1>{{$product->name}}</h1>
                        </div>
                    </div>
                    <div class="description">{{$product->description}}</div>
                </div>
                <div class="box-down">
                    <div class="h-bg">
                        <div class="h-bg-inner"></div>
                    </div>

                    <a class="cart" href="#">
                        <span class="price">{{$product->price}}</span>
                        <span class="add-to-cart">
                            <span class="txt">Add in cart</span>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div> ​
    </div>
</body>
@endsection