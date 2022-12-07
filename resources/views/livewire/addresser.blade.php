<div class="grid-x">
    {{-- <div class="cell"> --}}
    <input wire:change="update({{ $address->id }})" wire:model="newName" type="text" class="border"
        @if (isset($address->state)) @switch($address->state)
                @case (0)
                {{-- verbunden --}}
                style="background-color: #407545" @break
                @case (1)
                getrennt
                style="background-color: #763131" @break
                @case (2)
                {{-- Syntaxfehler --}}
                style="background-color: yellow" @break
                @case (3)
                {{-- Allg. Fehler --}}
                style="background-color: pink" @break
                @default style="background-color: violet"
            @endswitch
            @else
            style="background-color: gray" @endif
        maxlength="40" name="new" id="new">
    {{-- </div> --}}
    {{-- <div class="cell medium-10 large-1"> --}}
    {{-- <button wire:click='delete' class="alert button" type="submit">-</button> --}}
    {{-- </div> --}}
</div>
