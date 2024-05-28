    @extends("layoutWithFooter")

    @section("title", "Home")

    @section("content")
        <div class="h-[450px] pt-20 flex flex-row items-center bg-zinc-900 justify-between">
            <div class="w-1/2 px-12">
                <p class="font-bold text-4xl text-white">Best Car & Motorcycle Rental in Indonesia</p>
                <br>
                <p class="text-xl text-gray-300">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis debitis necessitatibus laborum quae saepe dolorem doloremque consequatur nobis id nemo. Quam debitis neque perferendis unde accusamus ipsa illum nostrum eligendi.</p>
            </div>
            <img src="/img/home_car.png" class=" w-1/2 px-12">
        </div>
        <div class="px-12 bg-zinc-900">
            <div class="h-[450px] flex items-center bg-zinc-900 overflow-x-scroll no-scrollbar" id= "slider">
                @for ($i = 0; $i < count($reviewList);  $i++)
                    <div class="min-w-72 p-5 h-5/6 mx-5 border rounded-2xl border-gray-700 flex flex-col items-center" id="card">
                        <div class="w-auto p-1 rounded-full bg-slate-700">
                            <img src="img/person/person-{{$i+1}}.jpg" alt="" class="w-28 rounded-full">
                        </div>
                        <p class="text-white text-lg my-3">{{$reviewList[$i]["name"]}}</p>
                        <p class="text-lg">{{$reviewList[$i]["star"]}}</p>
                        <p class="text-white mt-4 text-center">&#8220;{{$reviewList[$i]["desc"]}}&#8221;</p>
                    </div>
                @endfor
            </div>
            <div class="w-full flex text-white font-bold text-5xl justify-center content-center">
                <div class="mr-6 cursor-pointer" id="leftBtn">
                    <
                </div>
                <div class="cursor-pointer" id="rightBtn">
                    >
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var slider = document.getElementById("slider");
            var sliderWidth = slider.scrollWidth;
            var leftBtn = document.getElementById("leftBtn");
            var rightBtn = document.getElementById("rightBtn");
            var item = document.getElementById("card");
            var itemWidth = item.offsetWidth


            console.log(itemWidth)
            leftBtn.addEventListener("click", () => {
                var sliderPos = slider.scrollLeft;
                if (sliderPos <= 0) {
                    slider.scrollTo({ left: sliderWidth , behavior: "smooth"});
                } else {
                    slider.scrollBy({ left: -itemWidth , behavior: "smooth"});
                }
            });

            rightBtn.addEventListener("click", () => {
                var sliderPos = slider.scrollLeft;
                if (Math.ceil(sliderPos + slider.clientWidth) >= sliderWidth) {
                    slider.scrollTo({ left: 0 , behavior: "smooth"});
                } else {
                    slider.scrollBy({ left: itemWidth , behavior: "smooth"});
                }
            });
        </script>
    @endsection
