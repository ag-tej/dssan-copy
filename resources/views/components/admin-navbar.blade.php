@auth
    <nav class="fixed top-0 z-40 w-full bg-white border-b py-2 px-5 flex items-center justify-between">
        <div>
            <a href="/dashboard">
                <img src="{{ asset('images/logo/dssanblue.png') }}" alt="dssanlogo" class="max-w-[6rem]">
            </a>
        </div>
        <div>
            <button type="button" onclick="dropdownUser()" class="align-middle hover:drop-shadow">
                @if (Auth::user()->role == 'Admin')
                    <div class="w-10 h-10 rounded-full bg-cover"
                        style="background-image: url({{ asset('images/logo/deerlogo.png') }})"></div>
                @else
                    <div class="w-10 h-10 rounded-full bg-cover"
                        style="background-image: url({{ asset('/storage/' . Auth::user()->image) }})"></div>
                @endif
            </button>
        </div>
    </nav>
@endauth
