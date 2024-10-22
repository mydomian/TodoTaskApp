<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'due_date_time',
        'priority',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email','phone','address','user_type');
    }
}
