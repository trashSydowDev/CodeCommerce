@extends('welcome')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Nova Categoria de Produtos</h1>
            </header>

            {!! Form::open(['url' => '/admin/categories']) !!}

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