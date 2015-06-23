@extends('welcome')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Produto {{ $products_id->name }}</h1>
            </header>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>valor</th>
                    <th>Criado Em:</th>
                    <th>Atualizado Em:</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $products_id->id }}</td>
                    <td>{{ $products_id->name }}</td>
                    <td>{{ $products_id->description }}</td>
                    <td>{{ $products_id->price }}</td>
                    <td>{{ $products_id->created_at }}</td>
                    <td>{{ $products_id->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <a href="{{ route('products_edit',['id'=>$products_id->id]) }}" title="editar" class="btn btn-info" >Editar</a>
            <a href="{{ route('products_delete',['id'=>$products_id->id]) }}" title="delete" class="btn btn-danger" >Delete</a>
        </article>
    </div>
</section>
@stop
