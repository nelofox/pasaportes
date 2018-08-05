<?php

namespace Pasaporte;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = [

        'id',
        'name',
		'date',
		'email',
		'number',
        'office',
        'filename',
        'created_at',
        'updated_at'
        
	];

	protected $guarded = ['id'];
}
