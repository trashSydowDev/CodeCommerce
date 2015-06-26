<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Code Commerce</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ elixir("css/main.css") }}">
        <!--[if lt IE 9]>
        <script src="bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <main>

            <section class="container">
                <div class="content">
                    <article>
                        <a href="{{ route('index') }}" title="Home" >Home</a> |
                        <a href="{{ route('categories') }}" title="Categorias" >Categorias</a> |
                        <a href="{{ route('products') }}" title="Produtos" >Produtos</a>
                        @yield('content')
                    </article>
                </div>
            </section>
        </main>
    </body>
</html>
