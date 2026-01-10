<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;

class SalonController extends Controller
{
    public function index()
    {
        $salons = Salon::all();
        return view('salons.index', compact('salons'));
    }
    public function create()
    {
        return view('salons.create');
    }
    public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:men,women',
        'address' => 'required',
        'qr_code' => 'required|unique:salons,qr_code',
    ]);

    Salon::create($request->all());

    return redirect()->route('salons.index');
}
public function edit($id)
{
    $salon = Salon::findOrFail($id);
    return view('salons.edit', compact('salon'));
}
public function update(Request $request, $id)
{
    $salon = Salon::findOrFail($id);

    

    $request->validate([
        'name' => 'required',
        'type' => 'required|in:men,women',
        'address' => 'required',
        'qr_code' => 'required|unique:salons,qr_code,' . $salon->id,
    ]);

    $salon->update($request->all());

    return redirect()->route('salons.index');
}
public function destroy($id)
{
    $salon = Salon::findOrFail($id);

   

    $salon->delete();

    return redirect()->route('salons.index');
}


}
