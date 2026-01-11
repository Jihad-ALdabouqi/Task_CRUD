<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Salon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $services = Service::with('salon')
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->paginate(5);

        return view('services.index', compact('services'));
    }

    public function create()
    {
        $salons = Salon::all();
        return view('services.create', compact('salons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'salon_id' => 'required|exists:salons,id',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Service::find($id);

        if (!$service) {
            abort(404);
        }

        $salons = Salon::all();

        return view('services.edit', compact('service', 'salons'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'salon_id' => 'required|exists:salons,id',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            abort(404);
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
