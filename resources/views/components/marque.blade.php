<div x-data x-init="$nextTick(() => {
    const content = $refs.content;
    const item = $refs.item;
    const clone = item.cloneNode(true);
    content.appendChild(clone);
});" class="relative w-full container-block my-6">
    <div
        class="relative w-full py-3 mx-auto overflow-hidden text-lg italic tracking-wide text-white uppercase  max-w-7xl sm:text-xs md:text-sm lg:text-base xl:text-xl 2xl:text-2xl">
        <div class="absolute left-0 z-20 w-40 h-full bg-gradient-to-r from-white to-transparent"></div>
        <div class="absolute right-0 z-20 w-40 h-full bg-gradient-to-l from-white to-transparent"></div>
        <div x-ref="content" class="flex animate-marquee">
            <div x-ref="item"
                class="flex items-center justify-around flex-shrink-0 w-full py-2 space-x-2 text-gray-800">
                @for ($i = 1; $i <= 10; $i++)
                    <img class="hidden h-14 fill-current sm:block" src="{{ 'images/airlines/' . $i . '.png' }}"
                        alt="Image {{ $i }}">
                @endfor


            </div>
        </div>
    </div>
</div>
