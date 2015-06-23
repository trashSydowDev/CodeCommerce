@extends('welcome')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Produtos</h1>
                    </header>
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Criado Em:</th>
                            <th>Atualizado Em:</th>
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
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
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