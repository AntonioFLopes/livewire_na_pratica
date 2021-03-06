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
    protected $fillable = ['description', 'amount', 'type', 'user_id', 'photo', 'expense_date'];

    protected $dates = ['expense_date'];

    /**
     * @return float|int
     */
    public function getAmountAttribute()
    {
        return $this->attributes['amount'] / 100;
    }

    /**
     * @return float|int
     */
    public function setAmountAttribute($prop)
    {
        return $this->attributes['amount'] = $prop * 100;
    }

    /**
     * @return float|int
     */
    public function setExpenseDateAttribute($prop)
    {
        return $this->attributes['expense_date'] = (\DateTime::createFromFormat('d/m/Y H:i:s', $prop))->format('Y-m-d H:i:s');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
