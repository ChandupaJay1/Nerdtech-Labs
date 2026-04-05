@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <strong class="d-flex align-items-center gap-2"><i class="bi bi-exclamation-triangle-fill"></i> Fix the following:</strong>
        <ul class="mb-0 mt-2 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
