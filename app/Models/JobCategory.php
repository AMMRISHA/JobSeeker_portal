<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'job_category';  

    protected $primaryKey = 'job_category_id';

    // If the table does not use the default timestamps (created_at, updated_at), set this to false
    public $timestamps = false;

    // Define the fillable columns (you can specify which columns are mass assignable)
    protected $fillable = ['job_category'];

    // Optionally, if the 'job_category_id' is auto-incrementing, you can explicitly define it
    public $incrementing = true;

    // Optionally, if the 'job_category_id' is not an integer, you can define its type
    protected $keyType = 'int';
}
