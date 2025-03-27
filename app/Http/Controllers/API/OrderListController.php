<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\OrderListCollection;
use App\Http\Resources\OrderListResource;
use App\Models\OrderList;
use App\Repositories\OrderListRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private OrderListRepository $orderListRepository,
    ) {}

    public function index()
    {
        Gate::authorize('viewAny', OrderList::class);
        $orderLists = $this->orderListRepository->getAll();
        return new OrderListCollection($orderLists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', OrderList::class);
        $orderList = $this->orderListRepository->create([
            'order_id' => $request->get('order_id'),
            'food_id' => $request->get('food_id'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'status' => 'IN_PROGRESS'
        ]);

        return new OrderListResource($orderList);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderList $orderList)
    {
        Gate::authorize('view', $orderList);
        return new OrderListResource($orderList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderList $orderList)
    {
        Gate::authorize('update', $orderList);
        $this->orderListRepository->update([
            'status' => $request->get('status')
        ], $orderList->id);

        return new OrderListResource($orderList->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderList $orderList)
    {
        //
    }
}
