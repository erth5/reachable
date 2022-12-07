@extends('layout')
@section('c')
    <livewire:pusher />
    <div class="grid-x" style="justify-content: center">
        @forelse ($addresses as $address)
            <livewire:addresser :address="$address" />
        @empty
        @endforelse
    </div>

    <div class="col-sm-12" id="bottom">
        <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
            role="alert" data-brk-library="component__alert" style="text-align: center;" >
            <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
            <strong class="font__weight-semibold">Info</strong>Info
        </div>
    </div>
@endsection
