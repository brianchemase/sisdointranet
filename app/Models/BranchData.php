<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchData extends Model
{
    use HasFactory;
    protected $table="tbl_branches";
    public $timestamps = false;
}
