<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'employee';
    public $timestamps = true;
}
