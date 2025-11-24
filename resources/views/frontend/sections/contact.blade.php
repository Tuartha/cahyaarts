<section class="container mt-[80px] xl:mt-[150px] relative z-20 mx-auto bg-primary sm:rounded-[70px] "
            id="kontak">
            <div class="container mx-auto text-center pt-12 ">
                <h2 class="text-center text-[50px] leading-tight mb-9 text-white">
                    {{ $contactPage->title }}
                </h2>
                <div class="grid grid-cols-1 gap-[2rem] xl:grid-cols-3 mx-auto pb-12 text-white">
                    @forelse ($contactItems as $contact) 
                        <div class="">
                            <a href="{{ $contact->link }}" target="_blank" class="contact-link">
                                <img src="{{ asset('storage/' . $contact->logo) }}" alt="Logo"
                                    class="mx-auto mb-6 w-[40px] h-[40px]" />
                                <p>{{ $contact->text }}</p>
                            </a>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500">
                            Belum ada layanan tersedia
                        </p>
                    @endforelse
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1342.921911276236!2d115.17994666146038!3d-8.645398950294899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238aee378e155%3A0x6e8d56763419f14b!2sSanggar%20Seni%20Cahya%20Art&#39;s%20Bali%20Qui!5e1!3m2!1sen!2sid!4v1762578644279!5m2!1sen!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-lg md:w-[600px] md:h-[400px] xl:col-span-3 justify-self-center mt-4"></iframe>
                    <a href="https://wa.me/+6287761233524" target="_blank" class=" xl:col-span-3 justify-self-center">
                        <button class="mx-auto btn btn-accent animate-bounce">
                            {{ $contactPage->button_text }} <i class="ri-arrow-right-line text-primary"></i>
                        </button>
                    </a>
                </div>
            </div>
        </section>