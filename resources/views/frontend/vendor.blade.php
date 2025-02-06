<x-frontend-layout>
    <section>
        <img class="w-full h-[90vh] object-cover" src="{{ asset(Storage::url($vendor->shop->logo)) }}" alt="{{ $vendor->shop->name }}" srcset="">
        <div class="grid grid-cols-12">
            <img class="w-full h-[80px]" src="{{ asset(Storage::url($vendor->shop->logo)) }}" alt="{{ $vendor->shop->name }}" srcset="">
            <div>
                <h1>{{ $vendor->shop->name }}</h1>
                <p>{{ $vendor->shop->address }}</p>
            </div>
        </div>
    </section>
</x-frontend-layout>