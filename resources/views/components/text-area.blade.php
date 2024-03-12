@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'p-1.5 text-sm bg-transparent border text-next-500 border-next-300 rounded-sm outline-0 focus:border-next-500 focus:shadow focus:shadow-next-300 focus:outline-none focus:ring-0 transition ease duration-150',
]) !!}>

{{ $value ?? $slot }}
    
</textarea>