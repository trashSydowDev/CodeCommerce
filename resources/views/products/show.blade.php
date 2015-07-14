@extends('admin')
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
                    <th>Valor</th>
                    <th>imagens</th>
                    <th>Cat</th>
                    <th>Dest</th>
                    <th>Rec</th>
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
                    <td><a href="{{ route('products_image',['id'=>$products_id->id]) }}" title="Imagem">Imagens</a></td>
                    <td><a href="{{ route('categories_show',['id'=>$products_id->category_id]) }}" title="Categoria" >{{ $products_id->category->name }}</a></td>
                    <td>{{ $products_id->featured }}</td>
                    <td>{{ $products_id->recommend }}</td>
                    <td>{{ date('d/m/Y', strtotime($products_id->created_at)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($products_id->updated_at)) }}</td>
                </tr>
                </tbody>
            </table>

            <a href="{{ route('products_edit',['id'=>$products_id->id]) }}" title="editar" class="btn btn-info" >Editar</a>
            <a href="{{ route('products_delete',['id'=>$products_id->id]) }}" title="delete" class="btn btn-danger" >Delete</a>
        </article>

        <aside>
            <h1>Tags Relacionadas</h1>

            <ul>
                @foreach($products_id->tags as $tag)
                <li><a href="{{ route('store_tag', ['id' => $tag->id]) }}" title="" >{{ $tag->name }}</a></li>
                @endforeach

            </ul>
        </aside>
    </div>
</section>
@stop
