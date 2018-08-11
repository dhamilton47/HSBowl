<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'confirmation_token',
        'avatar_path'
    ];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = [
        'administers',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_confirmed' => 'boolean',
    ];

    /**
     * Get the route key name for User.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Mark the user's account as confirmed.
     */
    public function emailConfirm()
    {
        $this->email_confirmed = true;
        $this->email_confirmation_token = null;

        $this->save();
    }

    /**
     * Get the path to the user's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        return asset($avatar ? ('storage/' . $avatar) : 'images/avatars/default.png');
    }

    /**
     * A user can administer many schools.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function administers()
    {
        return $this->belongsToMany(School::class, 'user_permission')
            ->withPivot('team_id')
            ->withTimestamps();
    }
}
