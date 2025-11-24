<section class="h-[640px] xl:h-[840px] relative z-20 overflow-hidden hero">
    <div class="absolute inset-0 bg-cover bg-no-repeat bg-fixed brightness-50 xl:rounded-bl-[290px] bg-center" 
        style="background-image: url('{{ asset('storage/' . $homePage->background_image) }}')">
    </div>
    <div class="container relative z-10 flex items-center justify-center h-full mx-auto xl:justify-start">
        <div class="w-[567px] flex flex-col items-center text-center xl:text-left lg:items-start" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true">
            <h1 class="font-Tertiary text-[45px] lg:text-[64px] mb-8 text-accent">
                {{ $homePage->title ?? "Sanggar Seni Cahya Art's Baliqui" }}
            </h1>
            <p class="mb-8 text-white drop-shadow-xl text-[18px]">
                {{ $homePage->deskripsi ?? 'Jasa Gamelan untuk Upacara Yadnya & Les Musik Tradisional Bali.' }}
            </p>
            <a href="{{ $homePage->button_link ?? 'https://wa.me/+6287761233524' }}" target="_blank">
                <button class="mx-auto btn btn-primary xl:mx-0">
                    {{ $homePage->button_text ?? "Hubungi Kami" }}<i class="ri-arrow-right-line text-accent"></i>
                </button>
            </a>
        </div>
    </div>
</section>