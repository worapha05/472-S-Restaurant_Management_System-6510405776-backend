<?php

namespace App\Http\Controllers\API;

use
    App\Http\Controllers\Controller;
use App\Http\Resources\Collections\InventoryLogCollection;
use App\Http\Resources\InventoryLogResource;
use App\Models\InventoryLog;
use App\Repositories\InventoryLogRepository;
use App\Repositories\StockEntryRepository;
use App\Repositories\StockItemRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    public function __construct(
        private InventoryLogRepository $inventoryLogRepository,
        private StockEntryRepository $stockEntryRepository,
        private StockItemRepository $stockItemRepository,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventoryLogs = $this->inventoryLogRepository->getAll();
        return new InventoryLogCollection($inventoryLogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'note' => ['required', 'min:3', 'max:255'],
            'total_cost' => ['required', 'numeric', 'min:0'],
            'source' => ['required', 'min:3', 'max:255'],
        ]);

        $inventoryLog = $this->inventoryLogRepository->create([
            'user_id' => $request->get('user_id'),
            'note' => $request->get('note'),
            'total_cost' => $request->get('total_cost'),
            'source' => $request->get('source'),
        ]);
        return new InventoryLogResource($inventoryLog->refresh());
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryLog $inventoryLog)
    {
        return new InventoryLogResource($inventoryLog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryLog $inventoryLog)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'note' => ['required', 'min:3', 'max:255'],
            'total_cost' => ['required', 'numeric', 'min:0'],
            'source' => ['required', 'min:3', 'max:255'],
        ]);

        $this->inventoryLogRepository->update([
            'user_id' => $request->get('user_id'),
            'note' => $request->get('note'),
            'total_cost' => $request->get('total_cost'),
            'source' => $request->get('source'),
        ], $inventoryLog->id);
        return new InventoryLogResource($inventoryLog->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryLog $inventoryLog)
    {
        $id = $inventoryLog->id;
        $stockEntries = $this->stockEntryRepository->findByInventoryLogId($id);
        foreach ($stockEntries as $stockEntry) {
            $stockItemId = $stockEntry->stock_item_id;
            if ($this->stockItemRepository->isEmptyCurrentStock($stockItemId)) {
                $stockEntry->delete();
            } else {
                return [
                    'success' => false,
                    'message' => "Cannot delete stock item with id {$id} because it has stock item {$stockItemId}"
                ];
            }
        }
        return [
            'success' => true,
            'message' => "Inventory lod with id {$id} has been deleted"
        ];
    }
}
