@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
@endif
