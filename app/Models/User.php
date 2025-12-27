<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $this->getKey(),
                'hash' => sha1($this->getEmailForVerification()),
            ]
        );

       $response = Http::withHeaders([
        'api-key' => env('BREVO_API_KEY'),
        'accept' => 'application/json',
        'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
        'sender' => [
            'email' => 'no-reply@brevo.com',
            'name'  => 'Studyora',
        ],
            'to' => [
                [
                    'email' => $this->email,
                    'name'  => $this->name,
                ],
            ],
            'subject' => 'Verifikasi Email Akun Studyora',
            'htmlContent' => "
                <p>Halo <b>{$this->name}</b>,</p>
                <p>Silakan klik tombol berikut untuk verifikasi email kamu:</p>
                <p>
                    <a href='{$verificationUrl}'
                       style='display:inline-block;
                              padding:12px 20px;
                              background:#4f46e5;
                              color:#ffffff;
                              text-decoration:none;
                              border-radius:6px'>
                        Verifikasi Email
                    </a>
                </p>
                <p>Jika bukan kamu, abaikan email ini.</p>
            ",
        ]);
    }

    public function getTotalPointsAttribute()
    {
        return $this->quizResults()->sum('score') * 10;
    }

    public function quizResults()
    {
        return $this->hasMany(Quiz_result::class);
    }
}
