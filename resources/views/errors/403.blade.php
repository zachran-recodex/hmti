<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <div class="flex min-h-screen flex-col items-center justify-center text-center">
            <div class="space-y-6">
                <div class="space-y-2">
                    <h1 class="text-4xl font-bold tracking-tighter text-zinc-800 dark:text-zinc-200 sm:text-6xl">
                        403
                    </h1>
                    <p class="text-lg text-zinc-600 dark:text-zinc-400">
                        Forbidden Access
                    </p>
                </div>

                <p class="mx-auto max-w-[600px] text-zinc-600 dark:text-zinc-400 md:text-lg">
                    Sorry, you don't have permission to access this page.
                </p>

                <div class="flex justify-center gap-3">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-4 py-2 text-sm font-semibold text-zinc-800 shadow-sm hover:bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-200 dark:hover:bg-zinc-800">
                        <flux:icon.users />
                        Go Back
                    </a>

                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-zinc-800 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-white">
                        <flux:icon.home />
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        @fluxScripts
    </body>
</html>