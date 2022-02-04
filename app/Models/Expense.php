<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['description', 'amount', 'type', 'user_id'];

    public function getAmountAttribue()
    {
        return $this->attributes['amount'] / 100;
    }

    public function setAmountAttribue()
    {
        return $this->attributes['amount'] * 100;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
