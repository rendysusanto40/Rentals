@extends("layout")

@section("title", "Motorcycle")

@section("content")
    <div class="pt-20 h-screen w-screen bg-zinc-900 flex justify-center items-center">
        <div class="bg-zinc-700 w-[700px] rounded-md py-5">
            <div class="text-white text-3xl text-center">
                Add Motorcycle to Rentals
            </div>
            <form enctype="multipart/form-data" action="{{route("motorcycles.store")}}" method="POST" class="flex flex-col mx-5">
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
                            <option value="" disabled selected>Select Motorcycle Type</option>
                            <option value="Cruiser" {{ request('type') == 'Cruiser' ? 'selected' : '' }}>Cruiser</option>
                            <option value="Sport" {{ request('type') == 'Sport' ? 'selected' : '' }}>Sport</option>
                            <option value="Touring" {{ request('type') == 'Touring' ? 'selected' : '' }}>Touring</option>
                            <option value="Standard" {{ request('type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="Dual-Sport" {{ request('type') == 'Dual-Sport' ? 'selected' : '' }}>Dual-Sport</option>
                            <option value="Dirt Bike" {{ request('type') == 'Dirt Bike' ? 'selected' : '' }}>Dirt Bike</option>
                        </select>
                        @error("type")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 flex flex-col">
                        <label for="brand" class="text-white my-2">Brand</label>
                        <select name="brand" id="brand" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Motorcycle Brand</option>
                            <option value="Honda" {{ request('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                            <option value="Yamaha" {{ request('brand') == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                            <option value="Kawasaki" {{ request('brand') == 'Kawasaki' ? 'selected' : '' }}>Kawasaki</option>
                            <option value="Suzuki" {{ request('brand') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                            <option value="Ducati" {{ request('brand') == 'Ducati' ? 'selected' : '' }}>Ducati</option>
                            <option value="Harley-Davidson" {{ request('brand') == 'Harley-Davidson' ? 'selected' : '' }}>Harley-Davidson</option>
                            <option value="BMW" {{ request('brand') == 'BMW' ? 'selected' : '' }}>BMW</option>
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
                        <label for="engine_capacity" class="text-white my-2">Engine Capacity</label>
                        <input type="number" name="engine_capacity" id="engine_capacity" placeholder="CC" class="rounded-md px-2 h-9">
                        @error("engine_capacity")
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 flex flex-col">
                        <label for="transmission" class="text-white my-2">Transmission</label>
                        <select name="transmission" id="transmission" class="rounded-md px-2 h-9">
                            <option value="" disabled selected>Select Motorcycle Transmission</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Semi-Automatic">Semi-Automatic</option>

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
                    <input type="submit" name="submit" class="text-xl rounded-xl py-2 px-4 my-3 bg-green-600 cursor-pointer" value="Add Motorcycle">
                </div>
            </form>
        </div>
    </div>
@endsection
