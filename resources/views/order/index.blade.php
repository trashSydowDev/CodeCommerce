@extends('admin')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Ordens</h1>
                    </header>
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comprador</th>
                            <th>Valor Total</th>
                            <th>Data da Ordem</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>R$ {{ $order->total }}</td>
                                    <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                    <td>
                                        @if($order->status == 0)
                                        Aguardando pagamento
                                        @elseif($order->status == 1)
                                        Pagamento confirmado
                                        @elseif($order->status == 2)
                                        Enviado
                                        @else
                                        Cancelado
                                        @endif
                                    </td>

                                    <td><a href="{{ route('order_edit', ['id' => $order->id]) }}" title="delete" class="btn btn-danger" >Alterar Status</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    @stop