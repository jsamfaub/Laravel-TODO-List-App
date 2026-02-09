<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'name',
        'completed_at'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function markAsCompleted() //TODO return value type
    {
        if (is_null($this->completed_at)) {
            $this->update(['completed_at' => now()]);
        }

        return true;
    }

    public function markAsNotCompleted() //TODO return value type
    {
        $this->update(['completed_at' => null]);

        return true;
    }
}
