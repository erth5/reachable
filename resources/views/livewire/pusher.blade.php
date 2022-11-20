    <div class="cell">
        <input wire:change="store" wire:model="address" type="text" id="new"
            placeholder="url / id"
            style="background-color:
        @if (isset($status)) @switch($status)
        @case (0) green @break
        @case (1) #5A0303 @break
        @case (2) yellow @break
        @default violett
        @endswitch
        @else
        gray @endif"
            maxlength="40" name="new" id="new">
    </div>
    {{-- ($event.target.value) --}}
