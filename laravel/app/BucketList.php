<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BucketList extends Model
{
    protected $table = 'bucket_lists';

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function trigger(): BelongsTo
    {
        return $this->belongsTo(Trigger::class);
    }

    /**
     * @return BelongsToMany
     */
    public function bucketListTriggers(): BelongsToMany
    {
        return $this->belongsToMany(
            Trigger::class,
            'bucket_list_trigger',
            'bucket_list_id',
            'trigger_id',
        );
    }
}
