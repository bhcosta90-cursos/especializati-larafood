<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, SoftDeletes;

    public function scopeByCompany(Builder $query, ?string $company = null)
    {
        return $query->where('company_id', $company ?: auth()->user()->company_id);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'name',
        'email',
        'password',
    ];

    public function search(array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (!empty($filter = $data['search'] ?? null)) {
                $query->where('name', 'like', "%{$filter}%")
                    ->orWhere('email', $filter);
            }
        });
    }

    public function permissions(): array
    {
        $dataPermissions = [];

        foreach ($this->company->plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($dataPermissions, $permission['name']);
            }
        }

        return $dataPermissions;
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions());
    }

    public function isAdmin()
    {
        return in_array($this->id, config('acl.admins'));
    }

    public function isCompany()
    {
        return !$this->isAdmin();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
