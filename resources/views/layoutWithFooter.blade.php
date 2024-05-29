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
    <div class="flex items-center">
        <li class="pl-5 pr-3">
            <a href="{{route("home")}}">
                <img src="\img\LogoRentals.svg" alt="" class="w-24">
            </a>
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
  <div class="dark:bg-zinc-950 h-[350px] mt-10">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4685425915904!2d106.77967441022699!3d-6.201753160726729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6dcc7d2c4ad%3A0x209cb1eef39be168!2sUniversitas%20Bina%20Nusantara%20Kampus%20Anggrek!5e0!3m2!1sid!2sid!4v1716868235828!5m2!1sid!2sid"
            width="350" height="300"
            style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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
