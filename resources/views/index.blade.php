@extends('layout')
@section('c')
    <livewire:pusher />
    <div class="grid-x" style="justify-content: center">
        @forelse ($addresses as $address)
            <livewire:addresser :address="$address" />
        @empty
        @endforelse
    </div>


@endsection
