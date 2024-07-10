<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Year
 *
 * @property int $id
 * @property int $year
 * @property string $encrypted_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Year extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['year', 'day'];
}