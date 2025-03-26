<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\StockEntryCollection;
use App\Http\Resources\InventoryLogResource;
use App\Http\Resources\StockEntryResource;
use App\Http\Resources\StockItemResource;
use App\Models\InventoryLog;
use App\Models\StockEntry;
use App\Repositories\InventoryLogRepository;
use App\Repositories\StockEntryRepository;
use App\Repositories\StockItemRepository;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    public function __construct(
        private StockEntryRepository $stockEntryRepository,
        private StockItemRepository $stockItemRepository,
        private InventoryLogRepository $inventoryLogRepository,
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
            'cost_per_unit' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:0'],
        ]);

        $stockEntry = $this->stockEntryRepository->create([
            'stock_item_id' => $request->get('stock_item_id'),
            'inventory_log_id' => $request->get('inventory_log_id'),
            'cost' => $request->get('cost'),
            'cost_per_unit' => $request->get('cost_per_unit'),
            'quantity' => $request->get('quantity'),
        ]);

        $inventory = $this->inventoryLogRepository->checkTypeIMPORT($request->get('inventory_log_id'));
        $stockItem = $this->stockItemRepository->getById($request->get('stock_item_id'));
        if ($inventory) {
            $stockItem->update(['current_stock' => $stockItem->current_stock + $request->get('quantity')]);
        } else {
            $stockItem->update(['current_stock'=> $stockItem->current_stock - $request->get('quantity')]);
        }

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
            'quantity' => ['required', 'numeric', 'min:0'],
        ]);

        $this->stockEntryRepository->update([
            'stock_item_id' => $request->get('stock_item_id'),
            'inventory_log_id' => $request->get('inventory_log_id'),
            'cost' => $request->get('cost'),
            'quantity' => $request->get('quantity'),
        ], $stockEntry->id);

        $inventory = $this->inventoryLogRepository->getById($request->get('inventory_log_id'));
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
