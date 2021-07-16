<x-app-layout>
    <style>
        .min-h-screen  {
            width: 1200px;
            margin: 0 auto;
        }
        .max-w-7xl{
            width: 1200px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
