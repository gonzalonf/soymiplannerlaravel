
<html>
    <head>
        <meta charset="utf-8">
        <title>404-No disponible</title>


        <style media="screen">
        .error{
            background-color: pink;
            width: 50%;
            margin: 70px auto;
            padding: 2em;
            text-align: center;

        }
        h2{

            font-weight: normal;
        }

        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="favicon" href="images/favicon.png">
    </head>
    <body>
        @include('../partials/nav')
        <div class="error" style="border-radius: 10px;">

            <h1>Error 404</h1>
            <h2>
                Lo sentimos: la página <b>'{{$_SERVER['REQUEST_URI'] }}'</b> no está disponible.
            </h2>
        </div>
        @include('partials/footer')

    </body>
</html>


