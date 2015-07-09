@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Em destaque</h2>

        @foreach ($featured as $products)
        <div class="col-sm-4">

            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">

                        @if (count($products->images))
                            <img src="{{ url('uploads/products/' . $products->images->first()->id . '.' . $products->images->first()->extension) }}" alt=""/>
                        @else
                            <img src="{{ url('images/no-img.jpg') }}" alt=""/>
                        @endif

                        <h2>R$ {{ $products->price }}</h2>

                        <p>{{ $products->name }}</p>

                        <a href="#" class="btn btn-default add-to-cart"><i
                                class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no
                            carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">

                            <h2>R$ {{ $products->price }}</h2>

                            <p>{{ $products->name }}</p>

                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--features_items-->


    <div class="features_items"><!--recommended-->
        <h2 class="title text-center">Recomendados</h2>

        @foreach ($recommend as $products)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">


                        @if (count($products->images))
                            <img src="{{ url('uploads/products/' . $products->images->first()->id . '.' . $products->images->first()->extension) }}" alt=""/>
                        @else
                            <img src="{{ url('images/no-img.jpg') }}" alt=""/>
                        @endif

                        <h2>R$ {{ $products->price }}</h2>

                        <p>{{ $products->name }}</p>
                        <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i
                                class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no
                            carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>R$ {{ $products->price }}</h2>

                            <p>{{ $products->name }}</p>
                            <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i
                                    class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
    <!--recommended-->

</div>
@stop