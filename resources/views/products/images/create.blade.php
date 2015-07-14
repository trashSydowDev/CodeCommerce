@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Upload de Imagem para o produto {{ $product->name }}</h1>
            </header>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif



            {!! Form::open(['route' => ['products_image_store', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                {!! Form::label('image', 'Imagem:') !!}

                {!! Form::file('image', null) !!}

                {!! Form::submit('Upload', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}


        </article>
    </div>
</section>
@stop