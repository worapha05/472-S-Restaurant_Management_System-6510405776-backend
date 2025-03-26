<?php

namespace App\Models\Enums;

enum InventoryLogType : string
{
    case IMPORT = "IMPORT";
    case EXPORT = "EXPORT";
}
