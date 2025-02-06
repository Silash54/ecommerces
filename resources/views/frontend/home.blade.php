<x-frontend-layout>
    {{--  shop start  --}}
    <section>
        <div class="container py-10">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl primary">Featured Restaurant/Store</h1>
                    <p>The nearest restaurant/store to your location</p>
                </div>
                <a href="" class=" fa-arrow-right">View All</a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($vendors as $vendor)
                    <div class=" overflow-hidden gap-6 md:gap-10 py-5">
                        <a href="{{ route('vendor',$vendor->id) }}">
                            <img class="h-[300px] w-full object-cover border rounded"
                                src="{{ asset(Storage::url($vendor->shop->logo)) }}" alt="{{ $vendor->shop->logo }}">
                            <div class="px-4 py-2">
                                <h1>{{ Str::limit($vendor->shop->name, 60, '...') }} ({{ count($vendor->products) }})</h1>
                                <small>{{ $vendor->shop->address }}</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--  Shop end  --}}

    {{--  Special Deals  --}}
    <section>
        <div class="container py-10">
            <div class="flex justify-between">
                <div>
                    <h1 class="primary text-2xl">Special Deals</h1>
                    <small>Best quality deals & products</small>
                </div>
                <a href="">View All</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                @foreach ($products as $product)
                    <x-product-cart :item="$product"/>
                @endforeach
            </div>
            
        </div>
    </section>
    {{--  end Special Deals  --}}
    {{--  Vendor Request Sections  --}}
    <section>
        <div class="container flex justify-center text-center py-20">
            <div>
                <h1>List your Restaurant or Store at Floor Digital Pvt. Ltd.! <br>
                    Reach 1,00,000 + new customers.
                </h1>
                <!-- Modal toggle -->
                <button data-modal-target="request-modal" data-modal-toggle="request-modal"
                    class="mt-5 bg-primary px-4 py-2 rounded" type="button">
                    SEND A REQUEST
                </button>
            </div>
        </div>
        <div>
            <!-- Main modal -->
            <div id="request-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-md shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex text-center items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl ps-2 primary">
                                Welcome to Floor Digital Pvt. Ltd.
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="request-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-2 space-y-2">
                                @error('name')
                                    <div class="text-red-600 bg-red-100">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('email')
                                    <div class="text-red-600 bg-red-100">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('phone')
                                    <div class="text-red-600 bg-red-100">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('shop_name')
                                    <div class="text-red-600 bg-red-100">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="{{ route('vendor_request') }}" method="post">
                                @csrf
                                <div class="grid grid-cols-2 gap-5">
                                    <div>
                                        <label for="name">Your Name <span class="text-red-600">*</span></label>
                                        <input class="px-2 py-1 w-full border rounded-md" type="text"
                                            name="name" id="name" placeholder="Enter name" required
                                            value="{{ old('name') }}">
                                    </div>
                                    <div>
                                        <label for="email">Email <span class="text-red-600">*</span></label>
                                        <input type="text" class="px-2 py-1 w-full border rounded-md"
                                            name="email" id="email" placeholder="Enter email" required
                                            value="{{ old('email') }}">
                                    </div>
                                    <div>
                                        <label for="phone">Phone <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full px-2 py-1 border rounded-md "
                                            name="phone" id="phone" placeholder="Enter Phone number" required
                                            value="{{ old('phone') }}">
                                    </div>
                                    <div>
                                        <label for="shop_name">Shop Name <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full px-2 py-1 border rounded-md"
                                            name="shop_name" id="shop_name" placeholder="Enter Shop name" required
                                            value="{{ old('shop_name') }}">
                                    </div>
                                    <div class=" text-center col-span-2">
                                        <button type="submit"
                                            class="bg-primary px-2 py-2 text-white border rounded-md">SEND
                                            REQUEST</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  Vendor Request Sections end  --}}
</x-frontend-layout>
