@extends("layout")

@section("title", "Show")

@section("content")

<form action="{{route("order.motorcycle.create", $motorcycle)}}" method="post">
    @csrf
    <div class="py-20 min-h-screen max-w-screen flex flex-col items-center text-white">
        <h1 class="py-12 text-4xl font-bold">Rent Motorcycle Details</h1>
        <div class="w-[830px] h-[400px] flex justify-center items-center border border-b-0 border-white rounded-md rounded-b-none bg-zinc-800 py-12 ">
            <img src="{{ asset($motorcycle->image) }}" alt="{{ $motorcycle->model }}" class="w-5/12 h-full object-contain object-center mr-14 rounded-xl"/>
            <div class="text-xl">
                <h2 class="text-3xl font-bold mb-2">Motorcycle Details</h2>
                <div>Model: {{$motorcycle->model}}</div>
                <div>Brand: {{$motorcycle->brand}}</div>
                <div>Type: {{$motorcycle->type}}</div>
                <div>Engine: {{$motorcycle->engine_capacity}} CC</div>
                <div>Transmission: {{$motorcycle->transmission}}</div>
                <div>Production Year: {{$motorcycle->production_year}}</div>
            </div>
        </div>
        <div class="w-[830px] h-[150px] flex flex-col items-center justify-center border border-y-0 border-white  bg-zinc-800">
            <h1 class="text-3xl font-bold pb-7">Renting Dates</h1>
            <div class="flex flex-row w-4/6 justify-evenly items-end">
                <div class="flex flex-col items-center gap-x-4 gap-y-2">
                    <label for="startDate" class="text-lg">Rent Start</label>
                    <input type="date" value="{{session("startDate")}}" name="startDate" id="startDate" class="pl-3 pr-4 rounded-lg text-black py-1 text-lg text-center">
                </div>
                <div class="flex flex-col items-center gap-x-4 gap-y-2">
                    <label for="endDate" class="text-lg">Rent End</label>
                    <input type="date" value="{{session("endDate")}}" name="endDate" id="endDate" class="pl-3 pr-4 rounded-lg text-black py-1 text-lg text-center">
                </div>
            </div>
        </div>
        <div class="w-[830px] flex flex-col items-center border border-y-0 border-white bg-zinc-800 py-12">
            <h1 class="text-3xl font-bold pb-12">Term & Conditions</h1>
            <div class="flex flex-row w-full items-center">
                <ol class="w-1/2 flex flex-col items-center border-r-2">
                    <li class="px-10 text-justify">1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, odit nostrum molestias et impedit eligendi eos rem labore consectetur, harum officiis, voluptatem error cumque ducimus? Dolor nesciunt numquam assumenda natus.</li>
                    <br>
                    <li class="px-10 text-justify">2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit possimus voluptatem ipsum optio minus quisquam nostrum perferendis quia exercitationem rem in quaerat maiores, adipisci ipsa provident nobis tempore ea reiciendis.</li>
                </ol>
                <ol class="w-1/2 flex flex-col items-center">
                    <li class="px-10 text-justify">1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, odit nostrum molestias et impedit eligendi eos rem labore consectetur, harum officiis, voluptatem error cumque ducimus? Dolor nesciunt numquam assumenda natus.</li>
                    <br>
                    <li class="px-10 text-justify">2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit possimus voluptatem ipsum optio minus quisquam nostrum perferendis quia exercitationem rem in quaerat maiores, adipisci ipsa provident nobis tempore ea reiciendis.</li>
                </ol>
            </div>
        </div>
        <div class="w-[830px] h-[285px] flex flex-col  items-center border border-y-0 border-white bg-zinc-800">
            <h1 class="text-3xl font-bold pb-12">Location Details</h1>
            <div class="flex flex-row gap-6">
                <div class="w-1/2 h-full pl-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.452238935666!2d106.77876962499028!3d-6.203920043783861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6c333606e4d%3A0x1f2ff138f214b056!2sBinus%20University!5e0!3m2!1sen!2sid!4v1717478320442!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="w-1/2 fa fa-location-dot text-xl pr-8">
                    <a class="text-2xl font-bold hover:underline" href="https://www.google.com/maps?ll=-6.201712,106.782538&z=16&t=m&hl=en&gl=ID&mapclient=embed&cid=2247279965963071574">Binus University Anggrek</a>
                    <hr color="white" class="my-3 ">
                    <p class="text-xl">
                        Jl. Raya Kb. Jeruk No.27, RT.1/RW.9, Kemanggisan, Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530
                    </p>
                </div>
            </div>
        </div>
        <div class="w-[830px] flex items-center justify-center border border-t-0 border-white bg-zinc-800">
            @php
                use Carbon\Carbon;

                $startDate = Carbon::parse(session('startDate'));
                $endDate = Carbon::parse(session('endDate'));
                $diffInDays = $startDate->diffInDays($endDate);
            @endphp
            <input type="number" name="price" id="price" value="{{$motorcycle->price * $diffInDays}}" hidden>
            <p class="text-xl text-green-500 mr-7">{{ 'Rp ' . number_format($motorcycle->price * $diffInDays, 0, ',', '.') }}</p>
            <button type="submit" class="px-3 py-2 text-white bg-green-500 my-12 text-xl rounded-xl">Rent Now</button>
        </div>
    </div>
</form>
@endsection
