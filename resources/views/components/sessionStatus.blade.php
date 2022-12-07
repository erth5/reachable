<div class="container mt-5 bottom">
    <div class="row">

        {{-- <div class="col-sm-12">
            <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
                role="alert" data-brk-library="component__alert">
                <button type="button" class="close font__size-18" data-dismiss="alert">
                    <span aria-hidden="true">
                        <i class="fa fa-times blue-cross"></i>
                    </span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
                <strong class="font__weight-semibold">Heads up!</strong> This alert needs your attention, but it's not
                super important.
            </div>
        </div> --}}

        <div class="col-sm-12">
            <div class="alert
            fade
            alert-simple
            alert-primary
            alert-dismissible
            rendered show"
                role="alert">
                {{-- <button type="button" class="close font__size-18" data-dismiss="alert">
                    <span aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                </button> --}}
                {{-- <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i> --}}
                <strong class="font__weight-semibold">info</strong>

                @if (session('status'))
                    {{ session('status') }}
                @endif
                @if (session('success'))
                    {{ session('success') }}
                @endif
                @if (session('error'))
                    {{ session('error') }}
                @endif

                @if (session('statusInfo'))
                    {{ session('statusInfo') }}
                @endif
                @if (session('statusSuccess'))
                    {{ session('statusSuccess') }}
                @endif
                @if (session('statusError'))
                    {{ session('statusError') }}
                @endif

                {{-- use with "withErrors", used lang->validation messages --}}
                @if ($errors->any())
                    {{ $errors->first() }}
                @endif

                @if ($errors->any() > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                @endif


            </div>
        </div>

    </div>
</div>
