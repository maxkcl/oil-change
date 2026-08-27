<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['odometer', 'previous_oil_change_date', 'previous_oil_change_odometer', 'oil_change_needed'])]
class Car extends Model
{
    //
}
