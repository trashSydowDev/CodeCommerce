@extends('welcome')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Categoria {{ $categories_id->name }}</h1>
            </header>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Criado Em:</th>
                    <th>Atualizado Em:</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $categories_id->id }}</td>
                    <td>{{ $categories_id->name }}</td>
                    <td>{{ $categories_id->description }}</td>
                    <td>{{ $categories_id->created_at }}</td>
                    <td>{{ $categories_id->updated_at }}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{ route('categories_edit',['id'=>$categories_id->id]) }}" title="editar" class="btn btn-info" >Editar</a>
            <a href="{{ route('categories_delete',['id'=>$categories_id->id]) }}" title="delete" class="btn btn-danger" >Delete</a>
        </article>
    </div>
</section>
@stop
