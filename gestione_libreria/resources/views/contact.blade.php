<style>
    @property --k {
        syntax: '<number>';
        initial-value: -1;
        inherits: true;
    }

    .spec {
        --m: 1 !important;
        grid-area: 2/ 1/ span 1/ span 2 !important;
        position: relative !important;
        margin: 1em !important;
        border: solid 2em transparent !important;
        padding: 1.5em 3.25em !important;
        border-radius: 5em !important;
        box-shadow: inset 0 0 1px #23429e !important;
        background:
            radial-gradient(#92372d, 67.5%, #F87060) padding-box,
            radial-gradient(#a0c2ed, 35%, #a0c2ed00 70%) 50% 0/ 80% 50% repeat-y !important;
        color: #f2fdfe !important;
        font: 700 1.25em/ 1 montserrat, sans-serif !important;
    }

    .spec:hover {
        background:
            radial-gradient(#2d3092, 67.5%, #7ecef6) padding-box,
            radial-gradient(#a0c2ed, 35%, #a0c2ed00 70%) 50% 0/ 80% 50% repeat-y !important;

    }

    @keyframes k {

        0%,
        33.3% {
            --k: 1;
        }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Us
        </h2>
    </x-slot>
    <div style="min-height: 100vh;">
        @component('components.duck-movement')
        @endcomponent

        <div class="py-4">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 w-50">
                @if(session('success'))
                <div class="bg-opacity-50 backdrop-blur-lg bg-neutral-300 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-md flex items-center animate__animated animate__fadeInDown">
                    <svg class="h-6 w-6 text-green-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
                @endif
                <form id="myForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white">Your Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Your Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-white">Message</label>
                        <textarea name="message" id="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>

                        </textarea>

                    </div>
                    <div class="text-end">
                        <!-- <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-200 disabled:opacity-25 transition detailButton border-1">Send Message</button> -->
                        <button type="submit" class="btn btn-warning tasto_dettaglio p-2 mt-3 spec w-50" style='width: 11rem;'>
                            Send Message
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>