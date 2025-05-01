<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{

    use HasRoles,
    Notifiable,
    UserAttribute,
    UserMethod,
    UserRelationship,
    UserScope,
    HasFactory;

protected $primaryKey = 'userid';

protected $guarded = [];  
}


