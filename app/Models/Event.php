<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_time', 'end_time', 'date'];

    protected $guarded = ['created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
