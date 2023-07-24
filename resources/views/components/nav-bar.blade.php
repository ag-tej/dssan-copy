<header class="z-10 fixed w-full top-0 bg-white border-b drop-shadow-sm">
    <section class="mx-auto w-11/12 py-1.5 flex justify-between items-center">
        <a href="/">
            <img src="{{ asset('images/logo/dssanblue.png') }}" alt="dssanlogo" class="max-w-[6rem]">
        </a>
        {{-- big screen navbar --}}
        <div>
            <button id="hamburger-button" class="text-black text-lg sm:hidden cursor-pointer">&#9776;</button>
            <nav class="hidden sm:block space-x-6 text-black font-semibold" aria-label="main">
                <a href="/" class="active:text-dwit-blue hover:text-dwit-blue delay-75">Home</a>
                <a href="/photo-gallery" class="active:text-dwit-blue hover:text-dwit-blue delay-75">Gallery</a>
                <a href="/alumni" class="active:text-dwit-blue hover:text-dwit-blue delay-75">Alumni</a>
                <a href="/news&events" class="active:text-dwit-blue hover:text-dwit-blue delay-75">News & Events</a>
            </nav>
        </div>
    </section>
    {{-- mobile view navbar --}}
    <section id="mobile-menu"
        class="absolute top-12 bg-ui-white sm:hidden w-full hidden flex-col origin-top animate-open-menu">
        <nav class="flex flex-col w-11/12 mx-auto pb-4 text-black" aria-label="mobile">
            <a href="/" class="py-1 active:text-dwit-blue hover:text-dwit-blue border-b border-black/70">
                Home
            </a>
            <a href="/photo-gallery" class="py-1 active:text-dwit-blue hover:text-dwit-blue border-b border-black/70">
                Gallery
            </a>
            <a href="/alumni" class="py-1 active:text-dwit-blue hover:text-dwit-blue border-b border-black/70">
                Alumni
            </a>
            <a href="/news&events" class="py-1 active:text-dwit-blue hover:text-dwit-blue border-b border-black/70">
                News & Events
            </a>
        </nav>
    </section>
    {{-- current page nav-link highlighting script --}}
    <script>
        $(function() {
            $('a').each(function() {
                if ($(this).prop('href') == window.location.href) {
                    $(this).addClass('text-dwit-blue');
                }
            });
        });
    </script>
</header>
