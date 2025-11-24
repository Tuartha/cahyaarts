<section class="testimonial mt-[80px] xl:mt-[200px] relative z-20" id="layanan">
            <div class="container mx-auto testimonial__bg px-6">
                <div class="flex flex-col items-center pt-[88px] pb-[110px]" data-aos="fade-up" data-aos-duration="1200"
                    data-aos-once="true">
                    <h2 class="text-[50px] leading-tight mb-4 text-center">
                        {{ $servicePage->title ?? 'Layanan Kami' }}
                    </h2>
                    <p class="mb-9 lg:w-[75%] text-center">
                        {{$servicePage->description ?? 'Kami menyediakan berbagai layanan seni tradisional Bali untuk memenuhi kebutuhan budaya dan hiburan Anda. Berikut adalah beberapa layanan yang kami tawarkan:'}}
                    </p>
                    <!-- Slider -->
                    <div class="w-full justify-center">
                        <div class="testimonial__slider swiper h-[450px]">
                            <div class="swiper-wrapper">
                                @forelse ($services as $service)
                                    <div class="swiper-slide">
                                        <!-- items -->
                                        <div class="w-full max-w-[450px] flex flex-col justify-center">
                                            <div
                                                class="h-[400px] absolute inset-0 bg-cover bg-no-repeat rounded-[30px]"
                                                style="background-image: url('{{ asset('storage/' . $service->image) }}')">
                                            </div>
                                        </div>
                                        <div class="z-10 relative ml-6 mt-72">
                                            <h3 class="text-white font-Tertiary text-[40px]">
                                                {{ $service->name }}
                                            </h3>
                                        </div>
                                    </div>  
                                @empty
                                    <p class="col-span-full text-center text-gray-500">
                                        Belum ada layanan tersedia
                                    </p>
                                @endforelse
                            </div>
                            <!-- Swipper Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>