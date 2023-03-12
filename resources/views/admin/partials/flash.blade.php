@if(session()->get('success'))

    <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row w-100 p-5 mb-6">
        {{ session()->get('success') }}
    </div>

@endif

@if ($errors->any())

    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row w-100 p-5 mb-6">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif