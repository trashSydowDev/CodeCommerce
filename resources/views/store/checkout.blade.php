@extends('store.store')

@section('content')

<div class="container">
    <div class="jumbotron">
        @if($cart == 'empty')
        <h3>Carrinho vazio</h3>
        @else
        <h3>Pedido realizado com sucesso !</h3>

        <p>O pedido #{{ $order->id }}, foi realizado com sucesso</p>
        @endif
    </div>
</div>

@endsection