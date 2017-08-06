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

    <div class='crear-cuenta' style="margin-bottom: 30px;">
        <h1 class="titulo_seccion">MIS VENTAS</h1>
        <hr>
    </div><br>

    <h2 style="margin-bottom: 30px;">A confirmar</h2>
    {{ var_dump($contacts) }}
    {{-- @isset($contacts)
    @foreach ($contacts as $contact)
    {{ var_dump($contact->product_id) }}
    @endforeach
    @endisset
    --}}
    <hr><br>

    <div class='crear-cuenta' style="margin-bottom: 30px;">
        <h1 class="titulo_seccion">MIS COMPRAS</h1>
        <hr>
    </div><br>

    <h2 style="margin-bottom: 30px;">A confirmar</h2>



    @include('partials/footer')
</body>
</html>