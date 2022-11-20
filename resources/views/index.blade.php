@extends('layout')
@section('c')
        <livewire:pusher />
            @forelse ($addresses as $address)
                <livewire:addresser :address="$address" />
            @empty
            @endforelse
@endsection
