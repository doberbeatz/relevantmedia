<?php

namespace App;

use App\RelevantMedia\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 *
 * @property array $fillable                        Fillable properties list
 * @property string $name                           User Name
 * @property string $email                          User Email
 * @property int $role_id                           Role Id
 * @property Role $role                             Role Relations
 *
 * @method static|User|Builder byRole($roleId)      Scope By Role Id
 */
class User extends Authenticatable
{

    /**
     * User Id key
     * @var string
     */
    public $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return User's Name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return Email of User
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Check if user is admin
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN;
    }

    /**
     * Set Role Id
     * @param $roleId
     * @return $this
     */
    public function setRole($roleId)
    {
        $this->role_id = $roleId;
        $this->save();

        return $this;
    }

    // Relationships

    /**
     * Role relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    // Scopes

    /**
     * @param self|Builder $query
     * @param int $roleId
     * @return self|Builder
     */
    public function scopeByRole($query, $roleId)
    {
        return $query->where('role_id', $roleId);
    }
}
