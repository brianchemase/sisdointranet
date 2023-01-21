<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanData extends Model
{
    use HasFactory;
    protected $table="tbl_loaning";
    public $timestamps = false;
}
