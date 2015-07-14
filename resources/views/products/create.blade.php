@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Novo Produto</h1>
            </header>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif



            {!! Form::open(['route' => 'products']) !!}

                {!! Form::label('category', 'Categoria:') !!}

                {!! Form::select('category_id', $categories, null) !!}

                {!! Form::label('name', 'Nome:') !!}

                {!! Form::text('name', null, ['placeholder' => 'Nome do Produto']) !!}

                {!! Form::label('description', 'Descrição:') !!}

                {!! Form::textarea('description', null, ['placeholder' => 'Descrição do Produto']) !!}

                {!! Form::label('valor', 'Valor:') !!}

                {!! Form::text('price', null, ['placeholder' => 'Valor do Produto']) !!}

                {!! Form::label('featured', 'Destaque:') !!}
                {!! Form::hidden('featured', 0) !!}
                {!! Form::checkbox('featured') !!}

                {!! Form::label('recommend', 'Recomendado:') !!}
                {!! Form::hidden('recommend', 0) !!}
                {!! Form::checkbox('recommend') !!}

                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags', null, ['placeholder' => 'Tags do produto']) !!}

                {!! Form::submit('Adicionar Produto', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}


        </article>
    </div>
</section>
@stop