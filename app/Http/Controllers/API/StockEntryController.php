<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\StockEntryCollection;
use App\Http\Resources\StockEntryResource;
use App\Models\StockEntry;
use App\Repositories\StockEntryRepository;
use App\Repositories\StockItemRepository;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    public function __construct(
        private StockEntryRepository $stockEntryRepository,
        private StockItemRepository $stockItemRepository
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockEntries = $this->stockEntryRepository->getAll();
        return new StockEntryCollection($stockEntries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'stock_item_id' => ['required', 'exists:stock_items,id'],
            'inventory_log_id' => ['required', 'exists:inventory_logs,id'],
            'cost' => ['required', 'numeric', 'min:0'],
            'quantity_added' => ['required', 'numeric', 'min:0'],
        ]);

        $stockEntry = $this->stockEntryRepository->create([
            'stock_item_id' => $request->get('stock_item_id'),
            'inventory_log_id' => $request->get('inventory_log_id'),
            'cost' => $request->get('cost'),
            'quantity_added' => $request->get('quantity_added'),
        ]);

        return new StockEntryResource($stockEntry);
    }

    /**
     * Display the specified resource.
     */
    public function show(StockEntry $stockEntry)
    {
        return new StockEntryResource($stockEntry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockEntry $stockEntry)
    {
        $validated = $request->validate([
            'stock_item_id' => ['required', 'exists:stock_items,id'],
            'inventory_log_id' => ['required', 'exists:inventory_logs,id'],
            'cost' => ['required', 'numeric', 'min:0'],
            'quantity_added' => ['required', 'numeric', 'min:0'],
        ]);

        $this->stockEntryRepository->update([
            'stock_item_id' => $request->get('stock_item_id'),
            'inventory_log_id' => $request->get('inventory_log_id'),
            'cost' => $request->get('cost'),
            'quantity_added' => $request->get('quantity_added'),
        ], $stockEntry->id);
        return new StockEntryResource($stockEntry->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockEntry $stockEntry)
    {
        $stockItemId = $stockEntry->stock_item_id;
        $id = $stockEntry->id;
        if ($this->stockItemRepository->isEmptyCurrentStock($stockItemId)) {
            $stockEntry->delete();
            return [
                'success' => true,
                'message' => "Stock entry with id {$id} has been deleted"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Cannot delete stock entry with id {$id} because it has stock item {$stockItemId}"
            ];
        }
    }
}
