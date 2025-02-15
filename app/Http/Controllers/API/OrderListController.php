<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\OrderListCollection;
use App\Http\Resources\OrderListResource;
use App\Models\OrderList;
use App\Repositories\OrderListRepository;
use Illuminate\Http\Request;

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
        $orderLists = $this->orderListRepository->getAll();
        return new OrderListCollection($orderLists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderList $orderList)
    {
        return new OrderListResource($orderList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderList $orderList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderList $orderList)
    {
        //
    }
}
