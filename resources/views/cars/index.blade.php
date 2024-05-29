@extends("layoutWithFooter")

@section("title", "Cars")

@section("content")
    <div class="pt-20 min-h-screen max-w-screen flex  flex-col items-center">
        <div class="text-white text-3xl font-bold pt-10 pb-5 flex flex-col items-center justify-center">
            List of Cars
            <p class="text-xl pt-1 mt-1 border-t border-w-500">
                Lorem akmlasmas;dmaksdjkas
            </p>
        </div>
        <div class="grid grid-cols-2 gap-x-12 gap-y-8">
            <div class="flex flex-col items-end justify-center col-span-2 mr-10 gap-y-0">
                <form action="{{route("cars.index")}}" method="get" class="flex items-center">
                    @csrf
                    <svg class="dark:fill-white dark:stroke-white mr-2" fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.4 490.4" xml:space="preserve" stroke="#00000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> <g> <path d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z"/> </g> </g>
                    </svg>
                    <input type="text" name="model" id="model" placeholder="Search Model" value="{{request("model") ?? ''}}" class="px-2 py-1 rounded-md">
                    <input type="submit" value="Search" class="bg-blue-500 ml-2 py-1 px-2 rounded-md cursor-pointer">
                </form>
                <div class="flex items-center mt-5">
                    @auth
                        @if (auth()->user()->isAdmin)
                        <a class="bg-green-500 py-1 px-2 mr-2 rounded-md" href="{{route("cars.create")}}">
                            Add New Car
                        </a>
                        @endif
                    @endauth
                    <div class="bg-zinc-300 text-center py-1 px-2 rounded-md flex items-center cursor-pointer border border-black" id="sortBtn">
                        <svg class="dark:fill-white dark:stroke-white mr-2" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.998 511.998" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#000000;" d="M271.44,308.729H183.3V69.214c0-17.121-13.88-31.001-31.001-31.001s-31.001,13.88-31.001,31.001 v239.515H33.157c-12.679,0-22.957,10.279-22.957,22.957c0,6.089,2.418,11.928,6.724,16.233l119.141,119.142 c4.483,4.483,10.358,6.724,16.233,6.724c5.875,0,11.751-2.242,16.233-6.724l119.142-119.142c4.305-4.305,6.724-10.144,6.724-16.233 C294.397,319.008,284.119,308.729,271.44,308.729z"></path> <g> <path style="fill:#000000;" d="M152.298,483.985c-8.857,0-17.183-3.449-23.445-9.711L9.711,355.132 C3.449,348.87,0,340.543,0,331.686c0-18.283,14.873-33.157,33.157-33.157h77.941V69.214c0-22.718,18.482-41.201,41.201-41.201 s41.201,18.483,41.201,41.201V298.53h77.941c18.283,0,33.157,14.874,33.157,33.157c0,8.856-3.448,17.182-9.711,23.445 L175.745,474.274C169.481,480.535,161.155,483.985,152.298,483.985z M33.157,318.928c-7.035,0-12.758,5.724-12.758,12.758 c0,3.409,1.327,6.612,3.737,9.022l119.141,119.141c2.409,2.41,5.614,3.737,9.021,3.737c3.409,0,6.612-1.327,9.022-3.737 l119.141-119.141c2.409-2.409,3.737-5.615,3.737-9.022c0-7.034-5.723-12.758-12.758-12.758H183.3 c-5.632,0-10.199-4.567-10.199-10.199V69.214c0-11.471-9.331-20.802-20.802-20.802c-11.47,0-20.802,9.331-20.802,20.802v239.515 c0,5.632-4.567,10.199-10.199,10.199H33.157z"></path> <path style="fill:#000000;" d="M228.462,374.31c-2.611,0-5.22-0.996-7.212-2.987c-3.983-3.983-3.983-10.441,0-14.425l2.008-2.008 c3.984-3.982,10.44-3.982,14.425,0c3.983,3.983,3.983,10.441,0,14.425l-2.008,2.008C233.682,373.313,231.073,374.31,228.462,374.31 z"></path> <path style="fill:#000000;" d="M154.008,448.764c-2.611,0-5.22-0.996-7.212-2.987c-3.983-3.983-3.983-10.441,0-14.425 l52.867-52.867c3.984-3.982,10.44-3.982,14.425,0c3.983,3.983,3.983,10.441,0,14.425l-52.867,52.867 C159.228,447.767,156.619,448.764,154.008,448.764z"></path> </g> <path style="fill:#000000;" d="M240.56,203.269H328.7v239.515c0,17.121,13.88,31.001,31.001,31.001 c17.121,0,31.001-13.88,31.001-31.001V203.269h88.139c12.679,0,22.957-10.279,22.957-22.957c0-6.089-2.418-11.928-6.724-16.233 L375.935,44.937c-4.483-4.483-10.358-6.724-16.233-6.724s-11.75,2.242-16.233,6.724L224.326,164.078 c-4.305,4.305-6.724,10.144-6.724,16.233C217.603,192.99,227.881,203.269,240.56,203.269z"></path> <path style="fill:#000000;" d="M359.702,483.985c-22.718,0-41.201-18.483-41.201-41.201V213.468H240.56 c-18.283,0-33.157-14.873-33.157-33.157c0-8.856,3.448-17.182,9.711-23.445L336.255,37.724c6.263-6.262,14.59-9.711,23.446-9.711 s17.183,3.449,23.445,9.711l119.141,119.141c6.262,6.263,9.711,14.59,9.711,23.446c0,18.283-14.874,33.157-33.157,33.157H400.9 v229.316C400.902,465.502,382.42,483.985,359.702,483.985z M359.702,48.412c-3.409,0-6.612,1.327-9.022,3.737L231.539,171.29 c-2.409,2.409-3.737,5.615-3.737,9.022c0,7.034,5.723,12.758,12.758,12.758h88.141c5.632,0,10.199,4.567,10.199,10.199v239.515 c0,11.471,9.331,20.802,20.802,20.802c11.47,0,20.802-9.331,20.802-20.802V203.269c0-5.632,4.567-10.199,10.199-10.199h88.141 c7.034,0,12.758-5.723,12.758-12.758c0-3.409-1.327-6.612-3.737-9.022L368.723,52.149C366.314,49.738,363.11,48.412,359.702,48.412z "></path> </g></svg>
                        Sort & Filter
                    </div>
                </div>
            </div>
            <form action="{{route("cars.index")}}" method="get" class="hidden justify-evenly items-center col-span-2 ease-in-out duration-500 opacity-0 h-0" id="sort&filter">
                @csrf
                    <select name="type" id="type" class="rounded-md px-2 h-9">
                        <option value="" selected>All Type</option>
                        <option value="LCGC" {{ request('type')  == 'LCGC' ? 'selected' : '' }}>LCGC</option>
                        <option value="Compact" {{ request('type')  == 'Compact' ? 'selected' : '' }}>Compact</option>
                        <option value="Sedan" {{ request('type')  == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="SUV" {{ request('type')  == 'SUV' ? 'selected' : '' }}>SUV</option>
                        <option value="MPV" {{ request('type')  == 'MPV' ? 'selected' : '' }}>MPV</option>
                        <option value="Minivan" {{ request('type')  == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                        <option value="Pickup Truck" {{ request('type')  == 'Pickup Truck' ? 'selected' : '' }}>Pickup Truck</option>
                        <option value="Luxury" {{ request('type') == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                        <option value="Sports Car" {{ request('type') == 'Sports Car' ? 'selected' : '' }}>Sports Car</option>
                    </select>
                    <select name="brand" id="brand" class="rounded-md pl-2 h-9 pr-2">
                        <option value="" selected>All Brand</option>
                        <option value="Toyota" {{ request('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                        <option value="Honda" {{ request('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                        <option value="Ford" {{ request('brand') == 'Ford' ? 'selected' : '' }}>Ford</option>
                        <option value="Chevrolet" {{ request('brand') == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                        <option value="BMW" {{ request('brand') == 'BMW' ? 'selected' : '' }}>BMW</option>
                        <option value="Mercedes-Benz" {{ request('brand') == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                        <option value="Audi" {{ request('brand') == 'Audi' ? 'selected' : '' }}>Audi</option>
                        <option value="Volkswagen" {{ request('brand') == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                        <option value="Subaru" {{ request('brand') == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                        <option value="Nissan" {{ request('brand') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                        <option value="Tesla" {{ request('brand') == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                        <option value="Hyundai" {{ request('brand') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                        <option value="Kia" {{ request('brand') == 'Kia' ? 'selected' : '' }}>Kia</option>
                        <option value="Mazda" {{ request('brand') == 'Mazda' ? 'selected' : '' }}>Mazda</option>
                        <option value="Volvo" {{ request('brand') == 'Volvo' ? 'selected' : '' }}>Volvo</option>
                        <option value="Jeep" {{ request('brand') == 'Jeep' ? 'selected' : '' }}>Jeep</option>
                        <option value="Suzuki" {{ request('brand') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                            <option value="Mitsubishi" {{ request('brand') == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                    </select>
                    <input type="number" min="1900" placeholder="Production Year" name="production_year" id="production_year" value="{{request('production_year') ?? ""}}" class="rounded-md px-2 h-9 w-40"/>
                    <select name="people_capacity" id="people_capacity" class="rounded-md px-2 h-9">
                            <option value="" selected>All Seat</option>
                            <option value="2"{{ request('people_capacity') == '2' ? 'selected' : '' }}>2</option>
                            <option value="4-5" {{ request('people_capacity') == '4-5' ? 'selected' : '' }}>4-5</option>
                            <option value="6-7" {{ request('people_capacity') == '6-7' ? 'selected' : '' }}>6-7</option>
                            <option value="8+" {{ request('people_capacity') == '8+' ? 'selected' : '' }}>8+</option>
                    </select>
                    <select name="engine_type" id="engine_type" class="rounded-md px-2 h-9">
                            <option value="" selected>All Engine</option>
                            <option value="Petrol" {{ request('engine_type') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                            <option value="Diesel" {{ request('engine_type') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="HEV" {{ request('engine_type') == 'HEV' ? 'selected' : '' }}>Hybrid</option>
                            <option value="PHEV" {{ request('engine_type') == 'PHEV' ? 'selected' : '' }}>Plug-In Hybrid</option>
                            <option value="BEV" {{ request('engine_type') == 'BEV' ? 'selected' : '' }}>Electric</option>
                    </select>
                    <select name="transmission" id="transmission" class="rounded-md px-2 h-9">
                            <option value="" selected>All Transmission</option>
                            <option value="Manual" {{ request('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Automatic" {{ request('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        </select>
                    <select name="sort" id="sort" class="rounded-md px-2 h-9">
                        <option value="" disabled selected>Sort</option>
                        <option value="Lat" {{ request('sort') == 'Lat' ? 'selected' : '' }}>Latest</option>
                        <option value="Ear" {{ request('sort') == 'Ear' ? 'selected' : '' }}>Earliest</option>
                        <option value="ASC" {{ request('sort') == 'ASC' ? 'selected' : '' }}>Price, Low to High</option>
                        <option value="DESC" {{ request('sort') == 'DESC' ? 'selected' : '' }}>Price, High to Low</option>
                    </select>
                    <input type="submit" value="Apply Filter" class="bg-green-500 h-9 px-2 rounded-lg cursor-pointer">
            </form>
            @forelse ( $carList as $car)
                <div class="text-white w-[650px] h-[250px] border flex rounded-md p-4">
                    <img src="{{$car->image}}" class="w-1/2 h-full object-cover object-center" />
                    <div class="w-1/2 ml-4 flex flex-col justify-between">
                        <div class="flex justify-between items-center">
                            <p class="text-2xl">
                                {{$car->model}}
                            </p>
                            @auth
                                @if (auth()->user()->isAdmin)
                                <div class="flex">
                                    <a href="{{route("cars.edit", $car->id)}}" class="bg-yellow-500 px-2 rounded-sm cursor-pointer mr-2">Edit</a>
                                    <form action="{{route("cars.destroy", $car->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <input type="submit" value="X" class="bg-red-500 px-2 rounded-sm cursor-pointer">
                                    </form>
                                </div>
                                @endif
                            @endauth
                        </div>
                        <p class="text-zinc-300">
                            {{$car->brand ?? ""}}
                        </p>
                        <div class="flex mt-2">
                            <p class="flex items-center mr-5">
                                <img src="img\steering-wheel-svgrepo-com.svg" alt="" class="mr-1 h-6"/>
                                {{$car->transmission}}
                            </p>
                            <p class="flex items-center">
                                <img src="img\people-svgrepo-com.svg" alt="" class="mr-1 h-6"/>
                                {{$car->people_capacity}}
                            </p>
                        </div>
                        <p class="flex items-center mt-2">
                            <img src="img\luggage-svgrepo-com.svg" alt="" class="mr-1 h-6"/>
                            {{$car->trunk_capacity}} L
                        </p>
                        <div class="flex flex-col h-full items-end justify-end font-bold mt-3  ">
                            <p class="text-xl text-green-500 mr-7">{{ 'Rp ' . number_format($car->price, 0, ',', '.') }}</p>
                            <p class="text-zinc-500 -mt-5 -mr-2">/day</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-[1348px] col-span-2 text-2xl text-center text-white">
                    No Result Found.
                </div>
            @endforelse
        </div>
        <div class="py-16">
            {{$carList->withQueryString()->links()}}
        </div>
    </div>
    <script type="text/javascript">
        var sortBtn = document.getElementById("sortBtn");
        var sortFilter = document.getElementById("sort&filter");


        sortBtn.addEventListener("click", () => {
            sortFilter.classList.toggle("hidden");
            sortFilter.classList.toggle("flex");
            sortFilter.classList.toggle("opacity-0");
            sortFilter.classList.toggle("h-0");
            sortFilter.classList.toggle("opacity-100");
            sortFilter.classList.toggle("h-zuto");
        });
    </script>
@endsection
