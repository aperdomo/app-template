<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $pageSize)
 * @method static find(string $thingId)
 * @property string $id
 * @property string $name
 * @property string $description
 */
class Thing extends Model
{
    use HasFactory;
    use HasUuids;
}
