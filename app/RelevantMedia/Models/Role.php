<?php
namespace App\RelevantMedia\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\RelevantMedia\Models
 *
 * @property string $name    Name
 */
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
        'name',
    ];

    /**
     * Admin flag
     */
    const ADMIN = 1;
    /**
     * Employer flag
     */
    const EMPLOYER = 2;

    /**
     * Return Name of Role
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}