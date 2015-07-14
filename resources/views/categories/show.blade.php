@extends('admin')
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
                    <td>{{ date('d/m/Y', strtotime($categories_id->created_at)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($categories_id->updated_at)) }}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{ route('categories_edit',['id'=>$categories_id->id]) }}" title="editar" class="btn btn-info" >Editar</a>
            <a href="{{ route('categories_delete',['id'=>$categories_id->id]) }}" title="delete" class="btn btn-danger" >Delete</a>
        </article>

        <aside>
            <h1>Produtos Relacionados</h1>

            <ul>
                @foreach($categories_id->products as $prod)
                <li><a href="{{ route('products_show',['id'=>$prod->id]) }}" title="Produto relacionando" >{{ $prod->name }}</a></li>
                @endforeach
            </ul>
        </aside>

    </div>
</section>
@stop
