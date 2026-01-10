<h1>Edit Salon</h1>

<form action="{{ route('salons.update', $salon->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ $salon->name }}"><br><br>

    <label>Type</label>
    <select name="type">
        <option value="men" {{ $salon->type == 'men' ? 'selected' : '' }}>Men</option>
        <option value="women" {{ $salon->type == 'women' ? 'selected' : '' }}>Women</option>
    </select><br><br>

    <label>Address</label>
    <input type="text" name="address" value="{{ $salon->address }}"><br><br>

    <label>QR Code</label>
    <input type="text" name="qr_code" value="{{ $salon->qr_code }}"><br><br>

    <button type="submit">Update</button>
</form>
