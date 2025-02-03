@props(["item"])
<div class="border rounded-lg p-4 overflow-hidden hover:shadow-md duration-300">
    <a class="grid grid-cols-2 gap-2 items-center" href="">
        <img src="{{ asset(Storage::url($item->image)) }}" class="w-auto h-[120px] object-cover" alt="{{ $item->name }}" />
        <div>
            <h1 class="text-base font-semibold">{{ Str::limit($item->name,30,'...') }}</h1>
            <div class="text-xs">
                @if ($item->discount)
                <s class="text-red-600">Rs.{{ $item->price }}</s>
            @endif
            RS.{{ $item->price - $item->price * $item->discount/100 }}
            
            </div>
            <strong class="text-slate-400 text-sm">Hi-tech Computer</strong>
        </div>
    </a>
</div>