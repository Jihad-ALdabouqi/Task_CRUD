@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="GET">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search">
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Salon</th>
        <th>Actions</th>
    </tr>

    @foreach($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td>{{ $service->price }}</td>
            <td>{{ $service->salon->name }}</td>
            <td>
                <a href="{{ route('services.edit', $service->id) }}">Edit</a>

                <form method="POST"
                      action="{{ route('services.destroy', $service->id) }}"
                      class="delete-form"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>




{{ $services->appends(request()->query())->links() }}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // يمنع الحذف مباشرة

        Swal.fire({
            title: 'Are you sure?',
            text: "You won’t be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // ينفّذ الحذف
            }
        });
    });
});
</script>
