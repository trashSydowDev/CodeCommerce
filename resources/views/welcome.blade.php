<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ elixir("css/main.css") }}">

    </head>
    <body>
    <main>

        <section class="container">
            <div class="content">
                <article>
                    <a href="{{ url('/') }}" title="Home" >Home</a> |
                    <a href="{{ url('/admin/categories') }}" title="Categorias" >Categorias</a> |
                    <a href="{{ url('/admin/products') }}" title="Produtos" >Produtos</a>
                    @yield('content')
                </article>
            </div>
        </section>
    </main>
    </body>
</html>
