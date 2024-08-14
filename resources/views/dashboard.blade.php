<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
*{
    padding: 0;
    margin: 0;
}
    body{
        font-family: 'Poppins', sans-serif;
        color: #fff;
        background: #1f1f38;
        background-image: url({{ asset('bg-texture.png') }});
    }
    span{
        color: #da4518
    }
    a{
        text-decoration: none;
        padding: 1rem;
        background: #0d1fbd;
        color: #fff;
        border-radius: 1rem;
        transition: 0.5s;

    }

    .logout_btn{
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center
    }
    a:hover{
        background: #007bff;
        color: #fff;
    }
</style>
<body>
    <h1 style="text-align: center">Bonjour <span>{{ Auth::user()->name }}</span> </h1>
    <div class="logout_btn"><a href="{{ route('logout') }}">Se deconnecter></a></div>
</body>
</html>