<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trigger extends Model
{
    public function bucketLists(): HasMany
    {
        return $this->hasMany(BucketList::class);
    }

    /**
     * @return BelongsToMany
     */
    public function BucketListTriggers(): BelongsToMany
    {
        return $this->belongsToMany(
            BucketList::class,
            'bucket_list_trigger',
            'trigger_id',
            'bucket_list_id',
        );
    }
}
