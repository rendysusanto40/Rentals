<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title") | {{config("app.name")}}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="{{route("motorcycles.index")}}" class="text-white hover:text-neutral-300 ease-in duration-100 delay-100 text-xl ">Motorcycles</a>
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
</body>
<footer class="bg-black border w-100% flex h-80  ">
    <div class="w-1/4 place-content-center items-center flex"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.452238935666!2d106.77876962499028!3d-6.203920043783861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6c333606e4d%3A0x1f2ff138f214b056!2sBinus%20University!5e0!3m2!1sen!2sid!4v1717478320442!5m2!1sen!2sid" width="90%" height="90%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    <div class="w-3/4 text-white ">
        <div class="text-4xl font-mono">Contact Us</div>
        <ul>
            <li class="m-2">
                <div class="fa fa-location-dot text-xl">
                    <a class="m-1 font-sans text-xl" href="https://www.google.com/maps?ll=-6.201712,106.782538&z=16&t=m&hl=en&gl=ID&mapclient=embed&cid=2247279965963071574">
                        Jl. Rw. Belong No.3, RT.7/RW.6
                    </a>
                </div>
            </li>
            <li class="m-2">
                <div class="fab fa-facebook-f text-xl">
                    <a class="m-1 font-sans" href="https://www.facebook.com/">
                        Rentals
                    </a>
                </div>
            </li>
            <li class="m-2">
                <div class="fab fa-instagram text-xl">
                    <a class="m-1 font-sans" href="https://www.instagram.com/">
                        Rentals
                    </a>
                </div>
            </li>
            <li class="m-2">
                <div class="fab fa-twitter text-xl">
                    <a class="m-1 font-sans" href="https://twitter.com/">
                        Rentals
                    </a>
                </div>
            </li>
            <li class="m-2">
                <div class="fab fa-youtube text-xl">
                    <a class="m-1 font-sans" href="https://www.youtube.com">
                        Rentals
                    </a>
                </div>
            </li>
        </ul>

        <div>© 2024 Rentals | Rentals is a trademark of PT Rentals Cab Tbk.</div>

    </div>
</footer>
<script>
    var profileMenu = document.getElementById("profile-menu")
    var profile = document.getElementById("profile")

    profile.addEventListener("click", ()=>{
        profileMenu.classList.toggle("right-full")
    })
</script>
</html>
