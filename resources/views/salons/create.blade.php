<h1>Add New Salon</h1>

<form action="{{ route('salons.store') }}" method="POST">
    @csrf

    <label>Name</label>
    <input type="text" name="name"><br><br>

    <label>Type</label>
    <select name="type">
        <option value="men">Men</option>
        <option value="women">Women</option>
    </select><br><br>

    <label>Address</label>
    <input type="text" name="address"><br><br>

    <label>QR Code</label>
    <input type="text" name="qr_code"><br><br>

    <button type="submit">Save</button>
</form>
