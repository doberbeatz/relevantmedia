<?php
namespace App\RelevantMedia\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * @var string
	 */
	protected $table = 'roles';
	/**
	 * @var string
	 */
	protected $primaryKey = 'role_id';

	/**
	 * @var array
	 */
	protected $fillable = [
		'key',
		'name',
	];

	/**
	 * Return Name of Role
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}
}