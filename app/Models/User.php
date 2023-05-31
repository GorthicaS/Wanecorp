<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'membership',
        'payment_status',
        'payment_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'membership' => 'boolean',
        'payment_date' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function updateMembership(Request $request)
    {
        $userId = $request->input('user_id');
        $paymentStatus = $request->input('payment_status');

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Mettre à jour le statut de paiement
        $user->payment_status = $paymentStatus;

        // Vérifier si le paiement a été effectué
        if ($paymentStatus) {
            // Mettre à jour la date du paiement et l'adhésion d'un an
            $user->payment_date = Carbon::now();
            $user->membership = true;
        } else {
            // Réinitialiser la date du paiement et l'adhésion
            $user->payment_date = null;
            $user->membership = false;
        }

        $user->save();

        return response()->json(['message' => 'Statut de paiement et adhésion mis à jour avec succès'], 200);
    }

    public function getMembershipDaysLeftAttribute()
    {
        if ($this->payment_date) {
            $expirationDate = Carbon::parse($this->payment_date)->addYear();
            $daysLeft = Carbon::now()->diffInDays($expirationDate, false);

            return max(0, $daysLeft);
        }

        return 0;
    }
}
