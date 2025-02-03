<?php

namespace App\Http\Resources;

use App\Repositories\OrderListRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    protected $orderListRepo;

    public function __construct($resource)
    {
        parent::__construct($resource);
        // Instantiate the OrderListRepository
        $this->orderListRepo = new OrderListRepository();
    }

    public function toArray(Request $request): array
    {
        // Use the findByOrderId method to fetch the OrderList for the current order
        $orderLists = $this->orderListRepo->findByOrderId($this->id);
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'address' => $this->address,
            'accept' => $this->accept,
            'status' => $this->status,
            'type' => $this->type,
            'payment_method' => $this->payment_method,
            'sum_price' => $this->sum_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'order_lists' => OrderListResource::collection($orderLists),
        ];
    }
}
