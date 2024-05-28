@extends("layout")

@section("title", "Cars")

@section("content")
    <div class="pt-20 h-screen w-screen bg-zinc-900 flex justify-center items-center">
        <div class="bg-zinc-700 w-[700px] rounded-md py-5">
            <div class="text-white text-3xl text-center">
                Add Car to Rentals
            </div>
            <form enctype="multipart/form-data" action="{{route("cars.store")}}" method="POST" class="flex flex-col mx-5">
                @csrf
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="model" class="text-white my-2">Model</label>
                        <input model="text" name="model" id="model" class="rounded-md px-2 h-9">
                        @error("model")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="color" class="text-white my-2">Color</label>
                        <input type="text" name="color" id="color"class="rounded-md px-2 h-9">
                        @error("color")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="type" class="text-white my-2">Type</label>
                        <select name="type" id="type" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Car Type</option>
                            <option value="LCGC">LCGC</option>
                            <option value="Compact">Compact</option>
                            <option value="Sedan">Sedan</option>
                            <option value="SUV">SUV</option>
                            <option value="MPV">MPV</option>
                            <option value="Minivan">Minivan</option>
                            <option value="Pickup Truck">Pickup Truck</option>
                            <option value="Luxury">Luxury</option>
                            <option value="Sports Car">Sports Car</option>
                        </select>
                        @error("type")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="brand" class="text-white my-2">Brand</label>
                        <select name="brand" id="brand" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Car Brand</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Honda">Honda</option>
                            <option value="Ford">Ford</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="BMW">BMW</option>
                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                            <option value="Audi">Audi</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Tesla">Tesla</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Kia">Kia</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Volvo">Volvo</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Mitsubishi">Mitsubishi</option>

                        </select>
                        @error("brand")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/3 flex flex-col mr-2">
                    <label for="production_year" class="text-white my-2">Production Year</label>
                        <input type="number" min="1900" value="{{date("Y")}}" name="production_year" id="production_year" class="rounded-md px-2 h-9"/>
                        @error("production_year")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 flex flex-col mr-2">
                        <label for="people_capacity" class="text-white my-2">Passenger Capacity</label>
                        <select name="people_capacity" id="people_capacity" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Passenger Capacity</option>
                            <option value="2">2</option>
                            <option value="4-5">4-5</option>
                            <option value="6-7">6-7</option>
                            <option value="8+">8+</option>
                        </select>
                    @error("people_capacity")
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="w-1/3 flex flex-col">
                        <label for="trunk_capacity" class="text-white my-2">Trunk Capacity</label>
                        <input type="number" name="trunk_capacity" id="trunk_capacity"class="rounded-md px-2 h-9" placeholder="Liters">
                        @error("trunk_capacity")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="engine_type" class="text-white my-2">Engine Type</label>
                        <select name="engine_type" id="engine_type" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Engine Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="HEV">Hybrid</option>
                            <option value="PHEV">Plug-In Hybrid</option>
                            <option value="BEV">Electric</option>
                        </select>
                        @error("engine_type")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="transmission" class="text-white my-2">Transmission</label>
                        <select name="transmission" id="transmission" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Car Transmission</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                        @error("transmission")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <label for="price" class="text-white my-2">Price</label>
                <input type="number" name="price" id="price" class="rounded-md px-2 h-9">
                @error("price")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <label class="text-white my-2">Image</label>
                <input type="file" name="image" class="text-white">
                @error("image")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <div class="flex flex-col items-center">
                    <input type="submit" name="submit" class="text-xl rounded-xl py-2 px-4 my-3 bg-green-600 cursor-pointer" value="Add Car">
                </div>
            </form>
        </div>
    </div>
@endsection
