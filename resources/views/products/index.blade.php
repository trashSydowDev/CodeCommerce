@extends('welcome')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Produtos</h1>
                    </header>

                    <a href="{{ route('products_create') }}" title="create" class="btn btn-success" >Novo Produto</a>

                    <a href="{{ route('products_api') }}" title="api" class="btn btn-primary" >Produtos API</a>

                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Destaque</th>
                            <th>Recomendado</th>
                            <th>Acões</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>R$: {{ $product->price }}</td>
                                    <td>{{ $product->featured }}</td>
                                    <td>{{ $product->recommend }}</td>
                                    <td><a href="{{ route('products_show',['id'=>$product->id]) }}" title="Visualizar" class="btn btn-success" >Visualizar</a></td>
                                    <td><a href="{{ route('products_api_show',['id'=>$product->id]) }}" title="api" class="btn btn-success" >API</a></td>
                                    <td><a href="{{ route('products_edit',['id'=>$product->id]) }}" title="editar" class="btn btn-info" >Editar</a></td>
                                    <td><a href="{{ route('products_delete',['id'=>$product->id]) }}" title="delete" class="btn btn-danger" >Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    @stop