<form method="post" action="{{route('servers.store')}}">
    @csrf
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="host" value="Host" />
        <x-jet-input name="host" id="host" value="{{old('host')}}" type="text" class="mt-1 block w-full"  />
        <x-jet-input-error for="host" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="moderator" value="Модератор" />
        <select class="rounded" name="user_id" id="moderator">
            <option>Не назначен</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="description" value="Описание" />
        <x-jet-input name="description" id="description" value="{{old('description')}}" type="text" class="mt-1 block w-full"  />
        <x-jet-input-error for="description" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="api_key" value="API Key" />
        <x-jet-input name="api_key" id="api_key" value="{{old('api_key')}}" type="text" class="mt-1 block w-full"  />
        <x-jet-input-error for="api_key" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="api_class" value="API Class" />
        <x-jet-input name="api_class" value="{{old('api_class')}}" id="api_class" type="text" class="mt-1 block w-full"  />
        <x-jet-input-error for="api_class" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="sort" value="Sort" />
        <x-jet-input name="sort" id="sort" value="{{old('sort')}}" type="text" class="mt-1 block w-full"  />
        <x-jet-input-error for="sort" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="active" value="active" />
        <x-jet-checkbox name="active" value="1" checked="checked" id="active"></x-jet-checkbox>
    </div>
    <div class="col-span-6 sm:col-span-4 text-right">
        <x-jet-button>Save</x-jet-button>
    </div>
</form>