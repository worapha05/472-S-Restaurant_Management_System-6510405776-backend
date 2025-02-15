<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['status', 'seats'];
//    protected $guarded = ['number'];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($table) {
//            // Generate 'number' based on next available ID
//            $table->number = str_pad(Table::max('id') + 1, 2, '0', STR_PAD_LEFT);
//        });
//    }
}
