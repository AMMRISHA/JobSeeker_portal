<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Specify the table name (if it does not follow Laravel's naming convention)
    protected $table = 'jobs';  // Replace with your table name

    // Define the primary key for the table
    protected $primaryKey = 'job_id';

    // If the table does not use the default timestamps (created_at, updated_at), set this to false
    public $timestamps = false;

    // Define the fillable columns (you can specify which columns are mass assignable)
    protected $fillable = [
        'title',
        'description',
        'category',
        'key_skills',
        'city',
        'country',
        'added_by',
        'added_time',
        'modified_time',
    ];

    // Optionally, if the 'job_id' is auto-incrementing, you can explicitly define it
    public $incrementing = true;

    // Optionally, if the 'job_id' is not an integer, you can define its type
    protected $keyType = 'bigint';

    // Optionally, if you want to manage timestamps manually, set these properties
    // public $timestamps = false;  // If not using Laravel's created_at and updated_at columns
}
