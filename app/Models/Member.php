<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'phone_number',
    'street_address',
    'city',
    'state_province',
    'zip_postal_code',
    'country',
    'dob',
    'gender',
    'profile_picture',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
