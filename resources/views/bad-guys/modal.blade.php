<div class="w-full text-right">
    <x-jet-button wire:click="showModal">ADD</x-jet-button>
</div>
<x-jet-modal wire:model="modalOpened">
    <div class="px-6 py-4">
        <div class="text-lg">Новое нарушение!</div>
    </div>
    <div class="mt-4 px-4">
        <form wire:submit.prevent="save">
            <div class="py4">
                <x-jet-label for="bad_user" value="Нарушитель" />
                <x-jet-input wire:model.defer="bad.bad_user" type="text" class="w-full" value="" />
            </div>
            <div class="py4">
                <x-jet-label for="server" value="Сервер" />
                <select wire:model.defer="bad.server_id" class="rounded" id="server">
                    <option>...</option>
                    @foreach($servers as $server)
                        <option value="{{$server->id}}">{{$server->host}}</option>
                    @endforeach
                </select>
            </div>
            <div class="py4">
                <x-jet-label for="bad_user" value="Правило" />
                <select wire:model="bad.rule_id" class="rounded">
                    <option>...</option>
                    @foreach($rule as $r)
                        <option value="{{$r->id}}">{{$r->name}}</option>
                    @endforeach
                </select>
                <small class="text-gray-600 mt-3 ml-3 mr-3">
                    {{$recomendation}}
                </small>
            </div>
            <div class="py4">
                <x-jet-label for="bad_user" value="Вид наказания" />
                <select wire:model.defer="bad.punishment" class="rounded">
                    <option>...</option>
                    <option value="1">Mute</option>
                    <option value="2">Jail</option>
                    <option value="3">Ban</option>
                </select>
            </div>
            <div class="py4">
                <x-jet-label for="duration" value="Время наказания" />
                <x-jet-input wire:model.defer="bad.duration" id="duration" type="text"></x-jet-input>
            </div>
            <div class="py4">
                <x-jet-label for="note" value="Примечание" />
                <textarea wire:model.defer="bad.note" id="note" value="" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" >></textarea>
            </div>
            <div class="py4">
                <x-jet-button type="submit">SAVE</x-jet-button>
            </div>
            <x-jet-input wire:model="bad.user_id" type="hidden" name="user_id" value="" />
        </form>
    </div>
    <div class="px-6 py-4 bg-gray-100 text-right">

    </div>
</x-jet-modal>