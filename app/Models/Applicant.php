<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Applicant extends Model 
{
    protected $table = 'applicant_details';
    protected $primaryKey = 'applicant_id';
    protected $guarded = [];
}