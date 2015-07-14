@extends('store.store')

@section('content')

<section id="cart_items">

    <div class="container">

        <div class="table-responsive cart_info">

            @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

            @endif

            <table class="table table-condensed">

                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Valor</td>
                    <td class="price">Qtd</td>
                    <td class="price">Total</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                @forelse($cart->all() as $k => $item)
                <tr>
                    <td class="cart_product">
                        <a href="{{ route('store_product', ['id' => $k]) }}">imagem</a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="{{ route('store_product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                        <p>Código: {{ $k }}</p>
                    </td>
                    <td class="cart_price">
                        R$ {{ $item['price'] }}
                    </td>

                    <td class="cart_quantity">

                        {!! Form::open(['route' => ['cart_update', 'id' => $k], 'method' => 'post', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            {!! Form::text('qtd', $item['qtd'], ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Alterar Qtd', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}

                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">R$ {{ $item['price'] * $item['qtd'] }}</p>
                    </td>

                    <td class="">
                        <a href="{{ route('cart_delete', ['id' => $k]) }}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6">Sem produtos no carrinho!</td>
                </tr>

                @endforelse

                <tr class="cart_menu">
                    <td colspan="6">
                        <div class="pull-right">
                                <span>
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>
                            <a href="{{ route('checkout_place') }}" class="btn btn-success">Finalizar Comprar</a>
                        </div>
                    </td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

</section>

@endsection