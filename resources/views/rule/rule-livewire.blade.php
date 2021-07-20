<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rule edit
        </h2>
    </x-slot>
    <main>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('rule-component', ['row' => $row && null])
        </div>
    </main>
</x-app-layout>