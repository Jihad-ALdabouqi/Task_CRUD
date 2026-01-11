@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('services.update', $service->id) }}">
    @csrf
    @method('PUT')

    <input type="text"
           name="name"
           value="{{ old('name', $service->name) }}"
           placeholder="Service name">

    @error('name') <p>{{ $message }}</p> @enderror

    <input type="number"
           name="price"
           value="{{ old('price', $service->price) }}"
           placeholder="Price">

    @error('price') <p>{{ $message }}</p> @enderror

    <select name="salon_id">
        @foreach($salons as $salon)
            <option value="{{ $salon->id }}"
                {{ $service->salon_id == $salon->id ? 'selected' : '' }}>
                {{ $salon->name }}
            </option>
        @endforeach
    </select>

    @error('salon_id') <p>{{ $message }}</p> @enderror

    <button type="submit">Update</button>
</form>
