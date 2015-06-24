@extends('welcome')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Edição de Produtos {{ $products_id->name }}</h1>
            </header>

            <a href="{{ route('products') }}" title="Home" class="btn btn-success" >Voltar para os Produtos</a>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif



            {!! Form::open(['route' => ['products_update', $products_id->id], 'method' => 'put']) !!}

                {!! Form::label('name', 'Nome:') !!}

                {!! Form::text('name', $products_id->name, ['placeholder' => 'Nome do Poduto']) !!}

                {!! Form::label('description', 'Descrição:') !!}

                {!! Form::textarea('description', $products_id->description, ['placeholder' => 'Descrição do Produto']) !!}

                {!! Form::label('valor', 'Valor:') !!}

                {!! Form::text('price', $products_id->price, ['placeholder' => 'Valor do Produto']) !!}

                {!! Form::label('featured', 'Destaque:') !!}
                {!! Form::hidden('featured', 0) !!}
                {!! Form::checkbox('featured', 1, $products_id->featured) !!}

                {!! Form::label('recommend', 'Recomendado:') !!}
                {!! Form::hidden('recommend', 0) !!}
                {!! Form::checkbox('recommend', 1, $products_id->recommend) !!}

                {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}


        </article>
    </div>
</section>
@stop