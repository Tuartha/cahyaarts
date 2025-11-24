<header class="absolute top-0 left-0 z-50 flex items-center w-full bg-transparent h-[90px]">
        <div class="container mx-auto">
            <div class="relative flex items-center justify-between">
                <div class="">
                    <a href="" class="block py-6">
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="w-[65px]" />
                    </a>
                </div>
                <div class="flex items-center">
                    <button id="hamburger" name="hamburger" type="button" class="lg:hidden">
                        <i class="text-3xl ri-menu-4-line"></i>
                    </button>
                    <nav id="nav-menu"
                        class="absolute hidden bg-white rounded-lg shadow-lg max-w-[250px] w-full right-3 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="">
                                <a href="" class="flex py-2 mx-8 text-base">Beranda</a>
                            </li>
                            <li class="">
                                <a href="" class="flex py-2 mx-8 text-base">Tentang Kami</a>
                            </li>
                            <li class="">
                                <a href="" class="flex py-2 mx-8 text-base">Layanan</a>
                            </li>
                            <li class="">
                                <a href="" class="flex py-2 mx-8 text-base">Gallery</a>
                            </li>
                            <li class="">
                                <a href="" class="flex py-2 mx-8 text-base">Kontak</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>