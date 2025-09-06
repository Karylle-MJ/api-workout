<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayPlan extends Model
{
    protected $fillable = ['day','workout_title','details','is_rest'];

    public static function ordered()
    {
        $order = "FIELD(day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday')";
        return static::orderByRaw($order);
    }
}
