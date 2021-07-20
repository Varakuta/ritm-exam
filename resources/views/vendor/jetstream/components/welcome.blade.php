<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welcome to your Jetstream application!
    </div>
</div>
<div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md f
    ont-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500
    focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800
    active:bg-gray-50 disabled:opacity-25 transition"
    href="/dashboard/rules">Создать правило</a>
</div>
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
<div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    @livewire('rule-table-component')
</div>
