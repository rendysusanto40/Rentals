@extends("layout")

@section("title", "Cars")

@section("content")
    <div class="pt-20 h-screen w-screen bg-zinc-900 flex justify-center items-center">
        <div class="bg-zinc-700 w-[700px] rounded-md py-5">
            <div class="text-white text-3xl text-center">
                Edit Car
            </div>
            <form enctype="multipart/form-data" action={{route("cars.update", $car->id)}} method="POST" class="flex flex-col mx-5">
                @csrf
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="model" class="text-white my-2">Model</label>
                        <input model="text" name="model" id="model" value="{{$car->model}}" class="rounded-md pl-2 h-9 pr-2">
                        @error("model")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="color" class="text-white my-2">Color</label>
                        <input type="text" name="color" id="color" value="{{$car->color}}"class="rounded-md pl-2 h-9 pr-2">
                        @error("color")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="type" class="text-white my-2">Type</label>
                        <select name="type" id="type" class="rounded-md pl-2 h-9 pr-2">
                            <option value="LCGC" {{ $car->type == 'LCGC' ? 'selected' : '' }}>LCGC</option>
                            <option value="Compact" {{ $car->type == 'Compact' ? 'selected' : '' }}>Compact</option>
                            <option value="Sedan" {{ $car->type == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="SUV" {{ $car->type == 'SUV' ? 'selected' : '' }}>SUV</option>
                            <option value="MPV" {{ $car->type == 'MPV' ? 'selected' : '' }}>MPV</option>
                            <option value="Minivan" {{ $car->type == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                            <option value="Pickup Truck" {{ $car->type == 'Pickup Truck' ? 'selected' : '' }}>Pickup Truck</option>
                            <option value="Luxury" {{ $car->type == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                            <option value="Sports Car" {{ $car->type == 'Sports Car' ? 'selected' : '' }}>Sports Car</option>
                        </select>
                        @error("type")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="brand" class="text-white my-2">Brand</label>
                        <select name="brand" id="brand" class="rounded-md pl-2 h-9 pr-2">
                            <option value="Toyota" {{ $car->brand == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                            <option value="Honda" {{ $car->brand == 'Honda' ? 'selected' : '' }}>Honda</option>
                            <option value="Ford" {{ $car->brand == 'Ford' ? 'selected' : '' }}>Ford</option>
                            <option value="Chevrolet" {{ $car->brand == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                            <option value="BMW" {{ $car->brand == 'BMW' ? 'selected' : '' }}>BMW</option>
                            <option value="Mercedes-Benz" {{ $car->brand == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                            <option value="Audi" {{ $car->brand == 'Audi' ? 'selected' : '' }}>Audi</option>
                            <option value="Volkswagen" {{ $car->brand == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                            <option value="Subaru" {{ $car->brand == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                            <option value="Nissan" {{ $car->brand == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                            <option value="Tesla" {{ $car->brand == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                            <option value="Hyundai" {{ $car->brand == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                            <option value="Kia" {{ $car->brand == 'Kia' ? 'selected' : '' }}>Kia</option>
                            <option value="Mazda" {{ $car->brand == 'Mazda' ? 'selected' : '' }}>Mazda</option>
                            <option value="Volvo" {{ $car->brand == 'Volvo' ? 'selected' : '' }}>Volvo</option>
                            <option value="Jeep" {{ $car->brand == 'Jeep' ? 'selected' : '' }}>Jeep</option>
                            <option value="Suzuki" {{ $car->brand == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                            <option value="Mitsubishi" {{ $car->brand == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                        </select>
                        @error("brand")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/3 flex flex-col mr-2">
                    <label for="production_year" class="text-white my-2" >Production Year</label>
                        <input type="number" min="1900" value="{{$car->production_year}}" name="production_year" id="production_year" class="rounded-md pl-2 h-9 pr-2"/>
                        @error("production_year")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 flex flex-col mr-2">
                        <label for="people_capacity" class="text-white my-2">Passenger Capacity</label>
                        <select name="people_capacity" id="people_capacity" class="rounded-md pl-2 h-9 pr-2">
                            <option value="2" {{ $car->people_capacity == '2' ? 'selected' : '' }}>2</option>
                            <option value="4-5" {{ $car->people_capacity == '4-5' ? 'selected' : '' }}>4-5</option>
                            <option value="6-7" {{ $car->people_capacity == '6-7' ? 'selected' : '' }}>6-7</option>
                            <option value="8+" {{ $car->people_capacity == '8+' ? 'selected' : '' }}>8+</option>
                        </select>
                        @error("people_capacity")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 flex flex-col">
                        <label for="trunk_capacity" class="text-white my-2">Trunk Capacity</label>
                        <input type="number" name="trunk_capacity" id="trunk_capacity"class="rounded-md pl-2 h-9 pr-2"  value="{{$car->trunk_capacity}}">
                        @error("trunk_capacity")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row items-start">
                    <div class="w-1/2 flex flex-col mr-2">
                        <label for="engine_type" class="text-white my-2">Engine Type</label>
                        <select name="engine_type" id="engine_type" class="rounded-md pl-2 h-9 pr-2">
                            <option value="Petrol" {{ $car->engine_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                            <option value="Diesel" {{ $car->engine_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="HEV" {{ $car->engine_type == 'HEV' ? 'selected' : '' }}>Hybrid</option>
                            <option value="PHEV" {{ $car->engine_type == 'PHEV' ? 'selected' : '' }}>Plug-In Hybrid</option>
                            <option value="BEV" {{ $car->engine_type == 'BEV' ? 'selected' : '' }}>Electric</option>
                        </select>
                        @error("engine_type")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="transmission" class="text-white my-2">Transmission</label>
                        <select name="transmission" id="transmission" class="rounded-md pl-2 h-9 pr-2">
                            <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        </select>
                        @error("transmission")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <label for="price" class="text-white my-2">Price</label>
                <input type="number" name="price" id="price" class="rounded-md pl-2 h-9 pr-2"  value="{{$car->price}}">
                @error("price")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <label class="text-white my-2">Image</label>
                <input type="file" name="image" class="text-white">
                @error("image")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
                <div class="flex flex-col items-center">
                    <input type="submit" name="submit" class="text-xl rounded-xl py-2 px-4 my-3 bg-yellow-600 cursor-pointer" value="Edit Car">
                </div>
            </form>
        </div>
    </div>
@endsection
