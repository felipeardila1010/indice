<?php namespace Course;

use Illuminate\Database\Eloquent\Model;

class Index extends Model {

	protected $table = 'indexes';

	protected $fillable = ['weight','height','user_id'];

	public $timestamps = true;
	public $increments = true;

}
