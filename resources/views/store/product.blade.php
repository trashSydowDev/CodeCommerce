@extends('store.store')

@section('categories')
@include('store.partial.categories')
@stop

@section('content')

<!-- saved from url=(0046)http://portal.code.education/uploads/2379.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><style type="text/css"></style></head><body><div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if (count($products->images))
                    <img src="{{ url('uploads/products/' . $products->images->first()->id . '.' . $products->images->first()->extension) }}" alt=""/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" alt=""/>
                @endif

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($products->images as $images)
                        <a href="#"><img src="{{ url('uploads/products/' . $images->id . '.' . $images->extension) }}" alt="" width="80"/></a>

                        @endforeach
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $products->category->name }} > {{ $products->name }}</h2>

                <p>{{ $products->description }}</p>
                                <span>
                                    <span>R$ {{ number_format($products->price, 2, ",", ".") }}</span>
                                        <a href="{{ route('cart_add', ['id' => $products->id]) }}" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>


            </div>
            <!--/product-information-->
        </div>
        <div class="col-sm-7">
                    Tags:
                    @foreach($products->tags as $tag)
                        <a href="{{ route('store_tag', ['id' => $tag->id]) }}" class="btn btn-default cart">{{ $tag->name }}</a>
                    @endforeach

        </div>

    </div>
    <!--/product-details-->
</div>
<div id="window-resizer-tooltip">
    <a href="http://portal.code.education/uploads/2379.html#" title="Edit settings"></a>
    <span class="tooltipTitle">Window size: </span>
    <span class="tooltipWidth" id="winWidth"></span>
    x
    <span class="tooltipHeight" id="winHeight"></span>
    <br>
    <span class="tooltipTitle">Viewport size: </span>
    <span class="tooltipWidth" id="vpWidth"></span>
    x
    <span class="tooltipHeight" id="vpHeight"></span>
</div>
</body>
<object id="cbaada9b-2979-a6b4-7a4a-89a72b828c82" width="0" height="0" type="application/gas-events-abn">

</object>
</html>
@stop