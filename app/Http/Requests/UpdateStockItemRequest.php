<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStockItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:255',
                Rule::unique('stock_items', 'name')
                    ->ignore($this->stockItem)
            ],
            'category' => [
                'required',
            ],
            'current_stock' => [
                'required',
                'numeric',
                'min:0',
            ],
            'unit' => [
                'required',
                'min:3',
                'max:255',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'กรุณาระบุชื่อของวัตถุดิบ',
            'name.min' => 'ชื่อของวัตถุดิบต้องมีอย่างน้อย 2 ตัวอักษร',
            'name.max' => 'ชื่อของวัตถุดิบต้องไม่เกิน 255 ตัวอักษร',
            'name.unique' => 'ชื่อวัตถุดิบนี้มีอยู่แล้วในระบบ กรุณาเปลี่ยนเป็นชื่อใหม่',
            'category.required' => 'กรุณาระบุหมวดหมู่ของวัตถุดิบ',
            'current_stock.required' => 'กรุณาระบุจำนวนของวัตถุดิบ',
            'current_stock.numeric' => 'กรุณาระบุจำนวนเป็นตัวเลข',
            'current_stock.min' => 'จำนวนของวัตถุดิบต้องมีอย่างน้อย 0',
            'unit.required' => 'กรุณาระบุหน่วยของวัตถุดิบ',
            'unit.min' => 'หน่วยของวัตถุดิบต้องมีอย่างน้อย 3 ตัวอักษร',
            'unit.max' => 'หน่วยของวัตถุดิบต้องไม่เกิน 255 ตัวอักษร',
        ];
    }
}
