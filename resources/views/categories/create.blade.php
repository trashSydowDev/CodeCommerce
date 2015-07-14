@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Nova Categoria de Produtos</h1>
            </header>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif



            {!! Form::open(['route' => 'categories']) !!}

                {!! Form::label('name', 'Nome:') !!}

                {!! Form::text('name', null, ['placeholder' => 'Nome da categoria']) !!}

                {!! Form::label('description', 'Descrição:') !!}

                {!! Form::textarea('description', null, ['placeholder' => 'Descrição da categoria']) !!}

                {!! Form::submit('Adicionar Categoria', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}


        </article>
    </div>
</section>
@stop