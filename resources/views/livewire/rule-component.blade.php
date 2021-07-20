<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Rule edit
    </h2>
    </x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
        @if($rule->id)
        <div class="col-span-6 sm:col-span-4 mb-4 text-left">
            <x-jet-button wire:click="delete({{$rule->id}})" class="bg-red-700" type="button">Delete</x-jet-button>
        </div>
        @endif
        <form wire:submit.prevent="save">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="rule_name" value="Название правила:" />
                <x-jet-input id="rule_name" type="text" class="mt-1 block w-full"
                             wire:model.defer="rule.name" />
                <x-jet-input-error for="rule_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-jet-label for="rule_description" value="Наказание:" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="rule_description"
                          wire:model.defer="rule.description"></textarea>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-jet-label for="rule_punishment" value="Наказание:" />
                <x-jet-input id="rule_punishment" type="text" class="mt-1 block w-full"
                             wire:model="rule.punishment" />
                <x-jet-input-error for="rule_punishment" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4 text-right">
                <x-jet-button class="place-self-end" type="submit">Save</x-jet-button>
            </div>
            <x-jet-validation-errors />
        </form>

    </div>
</div>
