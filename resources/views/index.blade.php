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

<script>
    setTimeout(function() {
        console.log('first 10 secs');
        // window.location.reload();

        setInterval(function() {
            console.log('60 secs has passed');
            window.location.reload();
        }, 60000);

    }, 10000);
    console.log('page loaded');
</script>
