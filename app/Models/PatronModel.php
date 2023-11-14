<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatronModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_users';

    protected $fillable = [
        'username','userpass','role','email','status','created_at', 'updated_at'
    ]; 
}
