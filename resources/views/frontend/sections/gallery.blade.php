<section class=" mt-[80px]  relative z-20" id="galleri">
            <div class="container mx-auto xl:px-0" data-aos="fade-up" data-aos-duration="1200" data-aos-once="true"
                data-aos-delay="250">
                <!-- text -->
                <div class="mb-24 text-center">
                    <h2 class="text-[50px] leading-tight mb-4">{{ $galleryPage->title }}</h2>
                    <p class="max-w-3xl mx-auto">
                        {{ $galleryPage->short_description }}
                    </p>
                </div>
                <!-- Grid -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-x-[104px] gap-y-[56px]">
                    <!-- items -->
                    @forelse ($gallery as $gmbr)
                        <div class="w-full max-w-[548px] h-full mx-auto">
                            <div class="overflow-hidden hover:rounded-br-[80px] xl:rounded-br-[80px] aspect-video">
                                <img src="{{ asset('storage/' . $gmbr->image) }}" alt=""
                                    class="rounded-br-[80px] mb-6 hover:scale-110 transition-all duration-500" />
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <div>
                                    <h3 class="text-[25px] leading-tight">{{ $gmbr->description }}</h3>
                                </div>
                                <a href="" target="_blank">
                                    <button class="bg-accent-secondary w-[70px] h-[70px] rounded-full hover:bg-accent/20">
                                        <i class="pl-1 text-3xl ri-arrow-right-s-line text-primary"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500">
                            Belum ada layanan tersedia
                        </p>
                    @endforelse 
                </div>
                <div class="flex justify-center mt-14">
                    <a href="">
                        <button class="btn-primary btn">
                            Lihat lebih banyak
                            <i class="ri-arrow-right-line text-accent"></i>
                        </button>
                    </a>
                </div>
            </div>
        </section>