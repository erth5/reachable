<div class="grid-x">
    <div class="cell">
        {{-- {{ $address->state }} --}}
        <input wire:change="update({{ $address->id }})" wire:model="newName" type="text" id=""
            @if (isset($address->state)) @switch($address->state)
                @case (0)
                style="background-color: green" @break
                @case (1)
                style="background-color: #5A0303" @break
                @case (2)
                style="background-color: yellow" @break
                @case (3)
                style="background-color: pink" @break
                @default style="background-color: violet"
            @endswitch
            @else
            style="background-color: gray" @endif
            maxlength="40" name="new" id="new">
        {{-- </div> --}}
        {{-- <div class="cell medium-10 large-1"> --}}
        {{-- <button wire:click='delete' class="alert button" type="submit">-</button> --}}
    </div>
</div>
