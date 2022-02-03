<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable =  ['plan_id', 'references_transaction'];

    public function user()
    {
        return $this->belongTo(Plan::class);
    }

    public function plan()
    {
        return $this->belongTo(Plan::class);
    }
}
