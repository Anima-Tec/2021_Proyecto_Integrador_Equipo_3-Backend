<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = [
        'reason',
        'state',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
