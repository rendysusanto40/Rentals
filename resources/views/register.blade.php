@extends("layout")

@section("title", "Register")

@section("content")
    <div class="pt-20 h-screen w-screen bg-zinc-900 flex justify-center items-center">
        <div class="bg-zinc-700 w-2/5 rounded-md py-5">
            <div class="text-white text-3xl text-center">
                Register to Rentals
            </div>
            <form action="{{route("auth.store")}}" method="POST" class="flex flex-col mx-5">
                @csrf
                <label for="name" class="text-white my-2">Name</label>
                <input type="text" name="name" id="name" class="rounded-md pl-2 h-9">
                @error("name")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="email" class="text-white my-2">Email</label>
                        <input type="email" name="email" id="email" placeholder="test@example.com" class="rounded-md pl-2 h-9">
                        @error("email")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="phone-number" class="text-white my-2">Phone Number</label>
                        <input type="text" name="phone-number" id="phone-number"  class="rounded-md pl-2 h-9" placeholder="08123456789">
                        @error("phone-number")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="address" class="text-white my-2">Address</label>
                    <input type="text" name="address" id="address" placeholder="Jalan Cendrawasih No.30" class="rounded-md pl-2 h-9">
                    @error("address")
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="dob" class="text-white my-2">Date of Birth</label>
                        <input type="date" name="dob" id="dob"class="rounded-md pl-2 h-9">
                        @error("dob")
                            <p class="text-red-500 text-xs">User must be older than 17 years old.</p>
                        @enderror
                    </div>
                </div>
                <label for="password" class="text-white my-2">Password</label>
                <input type="password" name="password" id="password" class="rounded-md pl-2 h-9">
                <label for="confirm-password" class="text-white my-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirm-password" class="rounded-md pl-2 h-9">
                @error("password")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <div class="flex flex-col items-center">
                    <input type="submit" name="submit" class="text-xl rounded-xl py-2 px-4 mb-3 mt-5 bg-green-600 cursor-pointer" value="Submit">
                    <a href="{{route("auth.login")}}" class="underline text-zinc-400">Login Here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
