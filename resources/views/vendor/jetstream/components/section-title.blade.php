<div class="md:col-span-1 w-full flex justify-between">
    <div class="w-full px-4 sm:px-0">
        <h3 class="text-lg font-medium text-colortitleform">{{ $title }}</h3>

        <p class="mt-1 text-sm text-colorsubtitleform">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
