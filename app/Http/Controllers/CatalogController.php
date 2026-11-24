<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::with(['category', 'storageLocation'])
            ->when($request->q, fn($q, $v) => $q->where('name', 'like', "%$v%"))
            ->when($request->category, fn($q, $v) => $q->where('category_id', $v))
            ->when($request->status, fn($q, $v) => $q->where('status', $v))
            ->when($request->lokasi, fn($q, $v) => $q->where('found_location', 'like', "%$v%"))
            ->orderBy('found_at', $request->sort === 'terlama' ? 'asc' : 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('catalog.index', [
            'items'      => $items,
            'categories' => Category::all(),
        ]);
    }

    public function show(Item $item)
    {
        $item->load(['category', 'storageLocation']);
        return view('catalog.show', compact('item'));
    }
}