@auth
    <div id="dropdown-user" class="hidden">
        <div class="z-20 fixed top-0 w-full h-screen bg-black/20" onclick="dropdownUser()">
        </div>
        <div
            class="z-40 absolute top-16 right-5 border bg-white divide-y divide-gray-300 rounded-uihalf shadow origin-top animate-open-menu">
            <div class="px-4 py-3">
                <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                <p class="text-sm font-medium">{{ Auth::user()->email }}</p>
                <p class="text-sm font-medium">{{ Auth::user()->role }}</p>
            </div>
            <ul class="p-2">
                <a href="/update-password">
                    <li class="p-2 text-sm rounded-lg hover:bg-gray-100">
                        Update Password
                    </li>
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <li class="p-2 text-sm rounded-lg hover:bg-gray-100">
                        Sign out
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
@endauth
