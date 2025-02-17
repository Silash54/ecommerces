<x-frontend-layout>
    <section class="relative">
        <img class="w-full h-[90vh] object-cover" src="{{ asset(Storage::url($vendor->shop->logo)) }}"
            alt="{{ $vendor->shop->name }}" srcset="{{ $vendor->shop->name }}">
        <div
            class="grid grid-cols-12 items-center absolute bottom-0 left-5 md:left-10 lg:left-20 right-5 md:right-10 lg:right-20">
            <img class="w-full h-[80px]" src="{{ asset(Storage::url($vendor->shop->logo)) }}"
                alt="{{ $vendor->shop->name }}" srcset="{{ $vendor->shop->name }}">
            <div class=" col-span-11 bg-black opacity-70 h-full text-white flex justify-between items-center">
                <div class="px-3">
                    <h1>{{ $vendor->shop->name }}</h1>
                    <p>{{ $vendor->shop->address }}</p>
                </div>
                <div class="px-3">
                    <button data-modal-target="map-modal" data-modal-toggle="map-modal" type="button">
                        <i class="fa-solid fa-map"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Main modal -->
        <div id="map-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold primary">
                            {{ $vendor->shop->name }} location
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="map-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        {!! $vendor->shop->map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-10">
                <form action="{{ route('vendor',$vendor->id) }}" method="get">
                    @csrf
                    <div class="flex items-center">
                        <a href="" class="bg-gray-300 primary mr-2">All</a>
                    <input type="text" class="px-3 py-2 border rounded-l-md w-full" placeholder="Search" name="q">
                    <button type="submit" class=" bg-gray- primary px-3 py-2 border rounded-r-md ">Search</button>
                </form>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6 md:gap-10 py-5">
                @foreach ($products as $product)
                    <x-product-cart :item="$product"/>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
