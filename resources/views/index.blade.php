@extends('layout')
@section('c')
    <livewire:pusher />
    <div class="grid-x">
        @forelse ($addresses as $address)
            <livewire:addresser :address="$address" />
        @empty
        @endforelse
    </div>
@endsection
