<?php

namespace App\Models\Enums;

enum StockItemCategory : string
{
    case MEAT = "MEAT";
    case EGGS_DAIRY = "EGGS DAIRY";
    case VEGETABLES = "VEGETABLES";
    case FRUITS = "FRUITS";
    case GRAINS_STARCHES = "GRAINS STARCHES";
    case SEASONINGS = "SEASONINGS";
    case OILS_FATS = "OILS FATS";
    case OTHERS = "OTHERS";

    public static function fromThai(string $category): self
    {
        return match ($category) {
            "เนื้อสัตว์" => self::MEAT,
            "ผัก" => self::VEGETABLES,
            "ผลไม้" => self::FRUITS,
            "ไข่ & นม" => self::EGGS_DAIRY,
            "ธัญพืช & แป้ง" => self::GRAINS_STARCHES,
            "เครื่องปรุง" => self::SEASONINGS,
            "น้ำมัน & ไขมัน" => self::OILS_FATS,
            default => self::OTHERS,
        };
    }
}
