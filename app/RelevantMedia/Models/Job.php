<?php
namespace App\RelevantMedia\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 *
 * @property string $name                       Name
 * @property string $description                Description
 * @property string $email                      Email
 * @property integer $user_id                   User Id
 * @property boolean $is_visible                Is Visible
 * @property boolean $is_moderated              Is Moderated
 *
 * @property User $employer                     Is Moderated
 *
 * @method static|Builder|Job byAvailable()     Available Jobs Query
 * @method static|Builder|Job byVisible()       Visible Jobs Query
 * @method static|Builder|Job byModerated()     Visible Jobs Query
 * @method static|Builder|Job byUser($user_id)  Jobs By User Query
 * @method static|Job find($id)                 Jobs By User Query
 *
 * @package app\RelevantMedia\Models
 */
class Job extends Model
{
    use SoftDeletes;

    /**
     * @var string Job Id
     */
    public $primaryKey = 'job_id';

    /**
     * @var array Fillable properties
     */
    public $fillable = [
        'name',
        'description',
        'user_id',
        'is_visible',
        'is_moderated',
    ];

    /**
     * Name of Job
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of Job
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Is Job Visible
     * @return bool
     */
    public function isVisible()
    {
        return (bool) $this->is_visible;
    }

    /**
     * Is Job has been Moderated
     * @return bool
     */
    public function isModerated()
    {
        return (bool) $this->is_moderated;
    }

    /**
     * Set Job status as moderated
     */
    public function setModerated()
    {
        $this->moderated = 1;
        $this->save();
    }

    public function hasAccess()
    {
        return ($this->employer->getKey() == \Auth::user()->getKey()) || \Auth::user()->isAdmin();
    }

    // Relationships

    /**
     * Employer of posted job
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employer()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    // Scopes

    /**
     * Return Available Jobs (Visible and Moderated)
     * @param self|Builder $query
     * @return mixed
     */
    public function scopeByAvailable($query)
    {
        return $query->byVisible()->byModerated();
    }

    /**
     * Return Visible Jobs Query
     * @param Builder|self $query
     * @return Builder|self $query
     */
    public function scopeByVisible($query)
    {
        return $query->where('is_visible', 1);
    }

    /**
     * Return Moderated Jobs Query
     * @param Builder|self $query
     * @return Builder|self $query
     */
    public function scopeByModerated($query)
    {
        return $query->where('is_moderated', 1);
    }

    /**
     * Return Un-Moderated Jobs Query
     * @param Builder|self $query
     * @return Builder|self $query
     */
    public function scopeByUnmoderated($query)
    {
        return $query->where('is_moderated', 0);
    }

    /**
     * Return Jobs by Employer
     * @param Builder|self $query
     * @param int $user_id
     * @return Builder|self
     */
    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}