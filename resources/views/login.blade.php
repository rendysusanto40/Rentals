@extends("layout")

@section("title", "Login")

@section("content")
    <div class="pt-20 h-screen w-screen bg-zinc-900 flex justify-center items-center">
        <div class="bg-zinc-700 w-1/4 rounded-md py-5">
            <div class="text-white text-3xl text-center">
                Login to Rentals
            </div>
            <form action="{{route("auth.authenticate")}}" method="POST" class="flex flex-col mx-5">
                @csrf
                <label for="email" class="text-white my-2">Email</label>
                <input type="email" name="email" id="email" placeholder="test@example.com" class="rounded-md pl-2 h-9">
                @error("email")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <label for="password" class="text-white my-2">Password</label>
                <input type="password" name="password" id="password" class="rounded-md pl-2 h-9">
                @error("password")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <div class="flex flex-col items-center">
                    <input type="submit" name="submit" class="text-md rounded-xl py-2 px-3 mb-3 mt-5 bg-green-600 cursor-pointer" value="Submit">
                    <a href="{{route("auth.register")}}" class="underline text-zinc-400 text-md">Register Here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
