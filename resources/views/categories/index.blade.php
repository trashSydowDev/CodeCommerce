@extends('welcome')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Categorias</h1>
                    </header>
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Criado Em:</th>
                            <th>Atualizado Em:</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td><a href="{{ route('categories_show',['id'=>$category->id]) }}" title="Visualizar" class="btn btn-success" >Visualizar</a></td>
                                    <td><a href="{{ route('categories_api_show',['id'=>$category->id]) }}" title="api" class="btn btn-success" >API</a></td>
                                    <td><a href="{{ route('categories_edit',['id'=>$category->id]) }}" title="editar" class="btn btn-info" >Editar</a></td>
                                    <td><a href="{{ route('categories_delete',['id'=>$category->id]) }}" title="delete" class="btn btn-danger" >Delete</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    @stop
