<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
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
        <title>Portfolio</title>
    </head>
    <body class="mb-48" style="background-image: url('images/background.jpg')">
        <nav class="flex justify-between items-center mb-4" style="background-image:url('../images/background.jpg') ">
            <div class="text-1xl font-bold  text-white" style="margin: 2%" ><a href="/my_portfolio/public" > Medhelp </a>...</div>
                @auth
                 <h1 class="font-bold uppercase text-white text-4xl " style="margin-right: 3%"> Welcome <span style="color: brown">{{auth()->user()->ful_name}}</span>
                  <form method="post" class="inline" action="./logout" >
                    @csrf
                    <button type="submit" ><i class="fa-solid fa-door-closed"></i>Logout</button>
                  </form>
                </h1>
                 
                 @else
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="./register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="./loginform" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>   
            </ul> 
                @endauth
        </nav>
    {{--View Output--}}
    <main>
    @yield('content')
    </main>
    @auth
      @if(auth()->user()->role == "ADMIN")
      <footer
      class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold  text-white h-24 mt-24 opacity-90 md:justify-center" style="background-color: rgb(2, 39, 1)"
      >
      <p class="ml-2">Only for administrator</p>

      <a
          href="./project/create"
          class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
          >Post Project</a
      >
  </footer>
      @endif
    @endauth
    </body>
</html>