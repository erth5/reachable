<div class="grid-x">
    <div class="cell medium-6 large-4">

        <input wire:change="update({{$address->id}})" wire:model="newAddress"  type="text" id="" placeholder="" value="{{ $address->address }}"
        style="background-color: @if (isset($status)) @switch($status)
        @case (0) green @break
        @case (1) #5A0303 @break
        @case (2) yellow @break
        @default violett
        @endswitch
        @else
        gray @endif"
            maxlength="40" name="new" id="new">
    </div>
    <div class="cell medium-10 large-1">
        <button class="alert button" type="submit">-</button>
    </div>
</div>
