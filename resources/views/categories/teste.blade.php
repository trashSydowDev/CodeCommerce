@extends('welcome')
    @section('content')
        <section class="container">
            <div class="content">
                <article>
                    <header>
                        <h1>Categorias</h1>
                    </header>

                    <a href="{{ route('categories_create') }}" title="create" class="btn btn-success" >Nova Categoria</a>

                    <a href="{{ route('categories_api') }}" title="api" class="btn btn-default" >Categorias API</a>

                      {{ dd($categories) }}
                </article>
            </div>
        </section>
    @stop
