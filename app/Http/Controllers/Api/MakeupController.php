<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Makeup;
use Illuminate\Http\Request;

class MakeupController extends Controller
{
    public function index(Request $request)
    {
        $query = Makeup::query();

        $allowedFilters = ['brand', 'category'];

        foreach ($allowedFilters as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'shade' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $makeup = Makeup::create($validated);

        return response()->json($makeup, 201);
    }

    public function show(Makeup $makeup)
    {
        return response()->json($makeup, 200);
    }

    public function update(Request $request, Makeup $makeup)
    {
        $validated = $request->validate([
            'product_name' => 'sometimes|required|string|max:255',
            'brand' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'shade' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $makeup->update($validated);

        return response()->json($makeup, 200);
    }

    public function destroy(Makeup $makeup)
    {
        $makeup->delete();

        return response()->noContent();
    }
}
