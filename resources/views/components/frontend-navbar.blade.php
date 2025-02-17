<nav class="bg-primary shadow">
    <div class="container mx-auto py-2">
        <div class="flex items-center justify-between gap-4">
            <!-- Logo Section -->
            <div class="w-1/3 md:w-auto">
                <img class="w-[180px] md:w-[220px]" src="{{ asset(Storage::url($company->logo)) }}" alt="Company Logo">
            </div>
            <!-- Search Form (Visible on lg screens) -->
            <div class="hidden lg:block w-1/3">
                <form action="{{ route('compare') }}" method="get" class="flex items-center">
                    <input type="text" name="q" id="q" placeholder="Search for Product"
                        class="border border-gray-300 px-3 py-2 w-full rounded-l-md">
                    <button class="bg-gray-400 text-white px-4 py-2 rounded-r-md">Compare</button>
                </form>
            </div>
            @if (!Auth::user())
                <!-- Auth Buttons -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="bg-secondary text-white px-3 py-2 rounded">Login</a>
                    <a href="{{ route('register') }}" class="bg-secondary text-white px-3 py-2 rounded">SignUp</a>
                </div>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 px-2 py-1 rounded text-white">Logout</button>
                </form>
            @endif
        </div>

        <!-- Search Form (Visible on sm and md screens only) -->
        <div class="block lg:hidden pt-4">
            <form action="{{ route('compare') }}" name="q" id="q" method="get"
                class="flex items-center">
                <input type="text" placeholder="Search for Product"
                    class="border border-gray-300 px-3 py-2 w-full rounded-l-md">
                <button class="bg-gray-400 text-white px-4 py-2 rounded-r-md">Compare</button>
            </form>
        </div>
    </div>
</nav>
