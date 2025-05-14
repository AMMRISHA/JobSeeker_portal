<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JobDetails extends Model
{
     use HasFactory;

    protected $table = 'jobs';               // Your table name
    protected $primaryKey = 'job_id';        // 👈 Important: Tell Laravel what your primary key is
    protected $guarded = [];                 // Allow mass assignment (if needed)
    public $timestamps = true; 

    
}