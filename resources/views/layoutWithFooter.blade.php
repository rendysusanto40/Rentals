<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title") | {{config("app.name")}}</title>
  @vite('resources/css/app.css')
</head>
<body class="font-mono scroll-smooth bg-zinc-900">
  <ul class="sm:h-20 w-full dark:bg-zinc-950 flex justify-between items-center list-none fixed">
    <div class="flex">
        <li class="pl-12 pr-7">
            <a href="{{route("home")}}" class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl">Home</a>
        </li>
        <li class="px-7">
            <a href="{{route("cars.index")}}" class="text-white hover:text-neutral-300 ease-in duration-100 delay-100 text-xl">Cars</a>
        </li>
        <li class="px-7">
            <a href="" class="text-white hover:text-neutral-300 ease-in duration-100 delay-100 text-xl ">Motorcycles</a>
        </li>
        <li class="px-7">
            <a href="" class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl ">About Us</a>
        </li>
    </div>
    <div class="flex">
        @guest
            <li class="pl-12 pr-7">
                <a href="{{route("auth.register")}}" class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl">Register</a>
            </li>
            <li class="pl-12 pr-7">
                <a href="{{route("auth.login")}}" class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl">Login</a>
            </li>

        @endguest
        @auth
            <li class="pl-12 pr-7">
                <p class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl cursor-pointer" id="profile">
                    {{auth()->user()->name}}
                </p>
            </li>
            <div class="absolute flex flex-col top-20 h-auto right-full bg-zinc-600 rounded-md" id="profile-menu">
                <div class="text-white hover:text-neutral-300  ease-in duration-100 delay-100 text-xl cursor-pointer w-32 h-12 justify-center flex items-center">
                    <form action={{ route('auth.logout') }} method="POST">
                        @csrf
                        <input type="submit"  value="Logout"/>
                    </form>
                </div>
            </div>
        @endauth
    </div>
  </ul>
  @yield("content")
  <div class="dark:bg-zinc-950 h-[250px] mt-10">


  </div>
</body>
<script>
    var profileMenu = document.getElementById("profile-menu")
    var profile = document.getElementById("profile")

    profile.addEventListener("click", ()=>{
        profileMenu.classList.toggle("right-full")
    })
</script>
</html>
