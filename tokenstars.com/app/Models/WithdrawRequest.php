<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WithdrawRequest.
 *
 * @property enum $status
 * @property string $tokens_amount
 * @property TelegramUser $telegram_user
 */

class WithdrawRequest extends Model
{

    const STATUS_NEW = 'new';
    const STATUS_REJECTED = 'rejected';
    const STATUS_APPROVED = 'approved';
    const STATUS_SUCCEEDED = 'succeeded';
    const STATUS_FAILED = 'failed';

    const STATUSES = [
        self::STATUS_NEW,
        self::STATUS_REJECTED,
        self::STATUS_APPROVED,
        self::STATUS_SUCCEEDED,
        self::STATUS_FAILED,
    ];

    protected $fillable = [
        'status',
        'tokens_amount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telegram_user()
    {
        return $this->belongsTo('App\Models\TelegramUser');
    }

}
