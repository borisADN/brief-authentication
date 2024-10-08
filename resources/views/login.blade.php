<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    <title>Authentification</title>

</head>

<body >
    @if (session('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "timeOut": "3000",
            "showEasing": "linear"
        };
        toastr.error('{{ session('error') }}');

    </script>
   
@endif
        <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                    Connectez vous
                </h2>
                <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                    Ou
                    <a href="{{ route('home') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        creez un nouveau compte
                    </a>
                </p>
            </div>

         
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                                Email address
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="email" name="email" type="email" required="" autofocus=""
                                    name="email"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                            </div>

                        </div>

                        <div class="mt-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                                Password
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="password" type="password" required="" name="password"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                            </div>

                        </div>
<br>
                        <div class="text-sm leading-5">
                            <a href="{{ route('forgottenPassword') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                              Mot de passe oublié?
                            </a>
                          </div>
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit"
                                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    Se connecter
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>
