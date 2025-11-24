<section class="steps mt-[80px] relative z-20 xl:mt-[200px]" id="tentang">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-[2rem] xl:grid-cols-1 text-center">
            <h2 class="leading-tight text-[50px]">{{ $aboutPage->title }}</h2>
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $aboutPage->image) }}" alt="" class="w-[300px]" />
            </div>
            <p class="">
                {{ $aboutPage->description }}
            </p>
        </div>
    </div>
</section>