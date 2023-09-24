{{-- we changed layout to be a component --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- <div x-data="{ open: false }">
    <button @click="open = true">Expand</button>
 
    <span x-show="open">
        Content...
    </span>
</div> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body>
    {{-- <h1>
</h1> --}}

    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src='{{ asset('images/logo.png') }}'alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                {{--  if there is a user autheticatedc show these two li tags --}}
                <li>
                    <span class="font-bold ">
                        welcome : {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/listing/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>manage listing</a>
                </li>
                <li>
                    <form class="inline" method="POST" action="logout">

                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>logout
                        </button>
                    </form>
                </li>
            @else
                {{--  else  if there is  user authenticated show these two li tags --}}
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <main>

        {{-- @yield('content') --}}
        {{-- so this is where the blade template that extrends the layout.blade.php file will be rendered
    anything that extends the layout file and uses the

    --}}

        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white  h-12 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="listings/create" class="absolute  right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>
</body>

</html>
{{-- //  now we  will have  child blade html template reneder here at this yield directive
// it works like react router child routes nesting
// we use the @extends to tell laravel that we will --}}
