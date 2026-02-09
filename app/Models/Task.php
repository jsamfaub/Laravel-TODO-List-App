<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
