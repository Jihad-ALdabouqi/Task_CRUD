<h1>Salons List</h1>

<a href="{{ route('salons.create') }}">Add New Salon</a>

<hr>

@foreach($salons as $salon)
    <p>
        {{ $salon->name }} |
        {{ $salon->type }} |
        {{ $salon->address }}

        <a href="{{ route('salons.edit', $salon->id) }}">Edit</a>

        <form action="{{ route('salons.destroy', $salon->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endforeach
