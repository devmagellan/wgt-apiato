<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthenticationTrait;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Payment\Models\PaymentAccount;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Hash;
use App\Containers\WGT\Notifications\ResetPassword;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends UserModel implements ChargeableInterface ,AuthenticatableContract, AuthorizableContract, CanResetPasswordContract, JWTSubject
{

    use ChargeableTrait;
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable, SoftDeletes, MustVerifyEmail, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthdate',
        'email',
        'business_email',
        'phone',
        'mobile',
        'business_phone',
        'business_phone_extension',
        'business_mobile',
        'toll_free_business_number',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'password',
        'secret_phrase',
        'fingerprint_code',
    ];

    protected $casts = [
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'gender' => 'string',
        'birthdate' => 'date:Y-m-d',
        'email' => 'string',
        'business_email' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'business_phone' => 'string',
        'business_phone_extension' => 'string',
        'business_mobile' => 'string',
        'toll_free_business_number' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'zip_code' => 'string',
        'secret_phrase' => 'string',
        'fingerprint_code' => 'string',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'secret_phrase', 'fingerprint_code',
    ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function paymentAccounts()
    {
        return $this->hasMany(PaymentAccount::class);
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @param string
     * @return void
     */
    public function setPasswordAttribute($password): void
    {
        if (Hash::needsRehash($password)) {
            $password = Hash::make($password);
        }

        $this->attributes['password'] = $password;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    /**
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * @return BelongsToMany
     */
    public function employments()
    {
        return $this->belongsToMany(Firm::class)->as('work')->withPivot(['id', 'position']);
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

}
