<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'Fname',
        'Lname',
        'age',
        'phone'
    ];
       public function pharmacy()
       {
           return $this->belongsTo(pharmacy::class);
       }
    
}
