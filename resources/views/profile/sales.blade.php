<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mis Transacciones</title>
        <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="favicon" href="images/favicon.png">

    </head>
    <body>
        @include('partials/nav')

        <h1>Mis Ventas</h1>

        <h2>A confirmar</h2>
        {{ var_dump($contacts) }}
        {{-- @isset($contacts)
            @foreach ($contacts as $contact)
                {{ var_dump($contact->product_id) }}
            @endforeach
        @endisset
        --}}
        <h1>Mis Compras</h1>

        <h2>A confirmar</h2>


        @include('partials/footer')
    </body>
</html>