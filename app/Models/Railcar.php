<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Railcar extends Model
{
    use HasFactory;

    protected $dates = [
        'arrival_date' => 'Y-m-d H:i',
        'due_date'     => 'Y-m-d H:i',
    ];

    protected $fillable = [
        'name',
        'status',
        'area',
        'arrival_date',
        'due_date'
    ];


    // used constants in railcar model, because options are limited for area and status,
    const AREA_YARD = 'yard';
    const AREA_NORTH_GATE = 'north_gate';
    const AREA_SOUTH_SIDE = 'south_side';
    const AREA_PLATFORM_1 = 'platform_1';
    const AREA_PLATFORM_2 = 'platform_2';
    const AREA_PLATFORM_3 = 'platform_3';

    const STATUS_PARKED = 'parked';
    const STATUS_LOADING = 'loading';
    const STATUS_LOADED = 'loaded';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_ARCHIVED = 'archived';

    public static function areas()
    {
        return [
            self::AREA_YARD,
            self::AREA_NORTH_GATE,
            self::AREA_SOUTH_SIDE,
            self::AREA_PLATFORM_1,
            self::AREA_PLATFORM_2,
            self::AREA_PLATFORM_3,
        ];
    }

    public static function statuses()
    {
        return [
            self::STATUS_PARKED,
            self::STATUS_LOADING,
            self::STATUS_LOADED,
            self::STATUS_SHIPPED,
            self::STATUS_ARCHIVED,
        ];
    }

    public function getNiceAreaAttribute()
    {
        return __($this->area);
    }

    public function getNiceStatusAttribute()
    {
        return __($this->status);
    }

    public function getArrivalDateAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d\Th:m');
    }

    public function getDueDateAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d\Th:m');
    }

    public function getNiceArrivalDateAttribute()
    {
        return Carbon::parse($this->arrival_date)->format('Y-m-d h:m A');
    }

    public function getNiceDueDateAttribute()
    {
        return Carbon::parse($this->due_date)->format('Y-m-d h:m A');
    }
}
