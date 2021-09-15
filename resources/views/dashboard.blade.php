@include('layouts.flash')
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class='flex w-full '>
            @include('partials.back.sidebar')
        <div class="py-12 w-9/12">
            <div class="globTable mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @yield('content_bo')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script>
        
        gsap.from(".cardUser", {
            duration: 0.5,
            scale: 0,
            y: 80,
            ease: "power1.inOut",
            stagger: {
                grid: [7, 15],
                from: 11,
                amount: 0.5
            }
        });
        gsap.from(".td", {
            duration: 0.5,
            scale: 0.5,
            y: -500,
            ease: "back.out(1.7)",
            stagger: {
                grid: [7, 15],
                from: 11,
                amount: 1
            }
        });


    </script>
</x-app-layout>

