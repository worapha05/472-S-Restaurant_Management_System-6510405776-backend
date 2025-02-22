<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\TableCollection;
use App\Http\Resources\TableResource;
use App\Models\Table;
use App\Repositories\TableRepository;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private TableRepository $tableRepository
    ) {}

    public function index()
    {
        $tables = $this->tableRepository->getAll();
        return new TableCollection($tables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = $this->tableRepository->create([
            'status' => $request->get('status'),
            'seats' => $request->get('seats'),
        ]);

        return new TableResource($table);
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return new TableResource($table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $this->tableRepository->update([
            'status' => $request->get('status'),
            'seats' => $request->get('seats'),
        ], $table->id);

        return new TableResource($table->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
