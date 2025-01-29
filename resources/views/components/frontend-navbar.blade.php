<nav>
    <div class="container flex items-center justify-between">
        <div><img class="w-[220px]" src="{{ asset(Storage::url($company->logo)) }}" alt="" srcset=""></div>
        <div>
            <form action="" method="get">
                <input type="text" placeholder="Search for Product">
                <button class="bg-gray-400 primary px-2 py-2">Compare</button>
            </form>
        </div>
        <div>
            <a href="{{ route('login') }}" class=" primary bg-secondary px-3 py-2 rounded">Login</a>
            <a href="{{ route('register') }}" class="primary bg-secondary px-3  py-2 rounded">SignUp</a>
        </div>
    </div>
</nav>