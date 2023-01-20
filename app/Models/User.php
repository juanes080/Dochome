<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres_y_apellidos',
        'email',
        'password',
        'cedula',
        'fecha_de_expedicion',
        'sexo',
        'foto',
        'direccion',
        'telefono',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'

    ];

    public function specialties(){
        return $this->belongsToMany(Specialty::class)->withTimestamps();

    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
    }

    public function scopePatients($query) {

        return $query->where('role' , 'paciente');
    }

    public function scopeDoctors($query) {

        return $query->where('role' , 'doctor');
    }


}
