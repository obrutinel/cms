<div class="alert alert-danger border-0">
    <ul class="mb-0">
        @foreach ($messages as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>