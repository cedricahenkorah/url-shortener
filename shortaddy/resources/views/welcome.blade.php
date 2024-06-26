<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

</head>

<body>
    <div class="overflow-x-hidden bg-gray-50 min-h-screen">
        <header class="py-4 md:py-6" x-data="{expanded: false}">
            <div class="container px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        <h1 class="font-bold text-xl tracking-widest">SHORTADDY</h1>
                    </div>
                </div>
            </div>
        </header>

        <section class="pt-12 bg-gray-50 sm:pt-16">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto text-center">
                    <h1 class="px-6 text-lg text-gray-600 font-inter font-semibold">Simplify Sharing and Optimize Your Links with Our URL Shortener</h1>
                    <p class="mt-5 text-4xl font-bold leading-tight text-gray-900 sm:leading-tight sm:text-5xl lg:text-6xl lg:leading-tight font-pj">
                        Shorten Your Long URLs in
                        <span class="relative inline-flex sm:inline">
                            <span class="bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] blur-lg filter opacity-30 w-full h-full absolute inset-0"></span>
                            <span class="relative"> Seconds </span>
                        </span>
                    </p>

                    <form action="{{ route('urls.store')}}" method="POST" class="relative mt-10">
                        @csrf
                        <div class="absolute transitiona-all duration-1000 opacity-30 inset-0 bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter group-hover:opacity-100 group-hover:duration-200"></div>
                        <div class="relative space-y-4 sm:flex sm:space-y-0 sm:items-end">
                            <div class="flex-1">
                                <label for="link" class="sr-only">Long URL</label>
                                <div>
                                    <input type="text" name="link" required class="block w-full px-4 py-3 sm:py-3.5 text-base font-medium text-gray-900 placeholder-gray-500 border border-gray-300 rounded-lg sm:rounded-l-lg sm:rounded-r-none sm:text-sm focus:ring-gray-900 focus:border-gray-900" placeholder="Enter a long URL" />
                                </div>
                            </div>
                            <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 sm:text-sm text-base sm:py-3.5 font-semibold text-white transition-all duration-200 bg-gray-900 border border-transparent rounded-lg sm:rounded-r-lg sm:rounded-l-none hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">{{ __('Shorten') }}</button>
                        </div>

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />

                    </form>

                    <div class="mt-10 font-bold italic">

                        @if(session()->has('url.link'))
                        {!! session('url.link') !!}
                        @php
                        session()->forget('url.link')
                        @endphp
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>