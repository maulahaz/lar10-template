<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_employees';   

    protected $fillable = [
        'name','phone','address','username','created_at', 'updated_at'
    ]; 
}
