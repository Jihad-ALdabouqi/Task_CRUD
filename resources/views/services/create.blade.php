@if ($errors->any())
    <div style="color:red; border:1px solid red; padding:10px; margin-bottom:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('services.store') }}">
    @csrf

    <div>
        <input type="text"
               name="name"
               placeholder="Service name"
               value="{{ old('name') }}">
        @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="number"
               name="price"
               placeholder="Price"
               value="{{ old('price') }}">
        @error('price')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <select name="salon_id">
            <option value="">Select Salon</option>
            @foreach($salons as $salon)
                <option value="{{ $salon->id }}"
                    {{ old('salon_id') == $salon->id ? 'selected' : '' }}>
                    {{ $salon->name }}
                </option>
            @endforeach
        </select>
        @error('salon_id')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Save</button>
</form>
