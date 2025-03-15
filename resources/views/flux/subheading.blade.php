@props([
    'size' => null,
    'accent' => false,
])

@php
$classes = Flux::classes()
    ->add(match ($size) {
        '3xl' => 'text-2xl',
        '2xl' => 'text-xl',
        'xl' => 'text-lg',
        'lg' => 'text-base',
        default => 'text-sm',
        'sm' => 'text-xs',
    })
    ->add(match ($accent) {
        true => 'text-[var(--color-accent-content)]',
        default => 'text-zinc-500 dark:text-white/70',
        'disableDarkMode' => 'text-white/70 dark:text-white/70',
    })
    ;
@endphp

<div {{ $attributes->class($classes) }} data-flux-subheading>
    {{ $slot }}
</div>
