@extends('admin')
@section('content')
<section class="container">
    <div class="content">
        <article>
            <header>
                <h1>Imagem {{ $image->id }}</h1>
            </header>

            <a href="" title="create" class="btn btn-success" >Nova Imagem</a>

            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagem</th>
                    <th>Extensão</th>
                    <th>produto</th>

                    <th>Acões</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        <img src="{{ url('uploads/products/' . $image->id . '.' . $image->extension) }}" width="80px" alt="" title="" />
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td><a href="{{ route('products_show',['id'=>$image->product->id]) }}" title="produto">{{ $image->product->name }}</a></td>
                    <td><a href="{{ route('products_image_delete',['id'=>$image->id]) }}" title="delete" class="btn btn-danger" >Delete</a></td>
                </tr>

                </tbody>
            </table>


        </article>
    </div>
</section>
@stop