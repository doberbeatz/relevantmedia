<?php

namespace App;

use App\RelevantMedia\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 *
 * @property array $fillable    Fillable properties list
 * @property string $name       User Name
 * @property string $email      User Email
 * @property int $role_id       Role Id
 */
class User extends Authenticatable
{
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
     * Role relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    /**
     * Return User's Name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Role to User
     * @param $roleKey
     * @return User|bool
     */
    public function setRole($roleKey)
    {
        $role = Role::where('key', $roleKey)->first();
        if ($role) {
            $this->role_id = $role->getKey();
            $this->save();

            return $this;
        }

        return false;
    }
}
