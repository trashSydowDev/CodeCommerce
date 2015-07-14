@extends('admin')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Produtos</h1>
                    </header>

                    <a href="{{ route('products_create') }}" title="create" class="btn btn-success" >Novo Produto</a>

                    <a href="{{ route('products_api') }}" title="api" class="btn btn-default" >Produtos API</a>

                    {!! $products->render() !!}

                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Cat</th>
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
                                    <td>{{ str_limit($product->description, $limit = 15, $end = '...') }}</td>
                                    <td>R$: {{ $product->price }}</td>
                                    <td><a href="{{ route('categories_show',['id'=>$product->category->id]) }}" title="Categoria" >{{ $product->category->name }}</a></td>
                                    <td>{{ $product->featured }}</td>
                                    <td>{{ $product->recommend }}</td>
                                    <td><a href="{{ route('products_image',['id'=>$product->id]) }}" title="Imagem" class="btn btn-info" >Imagem</a></td>
                                    <td><a href="{{ route('products_show',['id'=>$product->id]) }}" title="Visualizar" class="btn btn-success" >Visualizar</a></td>
                                    <td><a href="{{ route('products_api_show',['id'=>$product->id]) }}" title="api" class="btn btn-default" >API</a></td>
                                    <td><a href="{{ route('products_edit',['id'=>$product->id]) }}" title="editar" class="btn btn-info" >Editar</a></td>
                                    <td><a href="{{ route('products_delete',['id'=>$product->id]) }}" title="delete" class="btn btn-danger" >Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $products->render() !!}
                </article>
            </div>
        </section>
    @stop