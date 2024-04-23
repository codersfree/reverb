<div>
    
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">

        <form wire:submit="save">
            <x-label>
                Mensaje
            </x-label>

            <x-textarea wire:model="body" class="w-full" placeholder="Escriba un mensaje"></x-textarea>

            <x-input-error for="body" />

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>

    </div>

    @if ($comments->count() > 0)

        <div class="bg-white rounded-lg shadow-lg px-6 py-3">

            <ul>
                @foreach ($comments as $message)
                    

                    <li class="py-3">
                        <div class="flex">

                            <div class="mr-4 shrink-0">
                                <img class="h-8 w-8 rounded-full object-cover object-center" src="{{$message->user->profile_photo_url}}" alt="">
                            </div>

                            <div class="flex-1">
                                <p>
                                    <b>
                                        {{$message->user->name}}
                                    </b>

                                    <span class="text-xs text-gray-500">
                                        {{$message->created_at->diffForHumans()}}
                                    </span>
                                </p>

                                {{$message->body}}
                            </div>

                        </div>
                    </li>

                @endforeach
            </ul>

        </div>

    @endif
</div>
