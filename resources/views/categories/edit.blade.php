@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Edição de Categoria {{ $categories_id->name }}</h1>
            </header>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif



            {!! Form::open(['route' => ['categories_update', $categories_id->id], 'method' => 'put']) !!}

                {!! Form::label('name', 'Nome:') !!}

                {!! Form::text('name', $categories_id->name, ['placeholder' => 'Nome da categoria']) !!}

                {!! Form::label('description', 'Descrição:') !!}

                {!! Form::textarea('description', $categories_id->description, ['placeholder' => 'Descrição da categoria']) !!}

                {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}


        </article>
    </div>
</section>
@stop