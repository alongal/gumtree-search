<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model {

    protected $table = 'filters';
    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at'];
}
