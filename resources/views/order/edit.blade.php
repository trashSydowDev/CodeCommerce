@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Edição de Status de Ordem</h1>
            </header>

            @if ($errors->any())

                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach

            @endif

            {!! Form::open(['route' => ['order_update', $order->id], 'method' => 'put']) !!}

                {!! Form::label('status', 'Status:') !!}


                {!! Form::select(
                    'status', [
                        '0' => 'Aguardando pagamento',
                        '1' => 'Pagamento confirmado',
                        '2' => 'Enviado',
                        '3' => 'Cancelado'
                        ])
                !!}

                {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}

        </article>
    </div>
</section>
@stop