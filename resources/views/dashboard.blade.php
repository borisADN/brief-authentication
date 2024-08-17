<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
        font-family: cursive;
        font-style: italic;
        font-size: 4rem;
        color: #da4518
    }
    span:hover{
        /* color: #0d1fbd; */
        cursor: pointer;
        text-decoration: underline;
        
       /* font-family: 'Poppins', sans-serif; */
    }
    a{
        text-decoration: none;
        padding: 1rem;
        background: #0d1fbd;
        color: #fff;
        border-radius: 1rem;
        transition: 0.5s;
    }
    i{
        font-size: 1.4rem;
        margin-right: 0.5rem;

    }

    .logout_btn{
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        place-items: center;
    }
    a:hover{
        background: #007bff;
        color: #fff;
    }
    .container{
        padding: 10rem;
        text-align: center;
    }
</style>
<body >
    <div class="container">
        <h1 style="text-align: center">Hello , Mr  <span>{{ Auth::user()->name }}</span> </h1>
        <div class="logout_btn" style="text-align: center"><a href="{{ route('logout') }}" onclick="return confirm('Voulez-vous vous deconnecter ?')"><i class="ri-logout-box-line"></i>Se deconnecter</a></div>
    </body>
    </div>
    
</html>