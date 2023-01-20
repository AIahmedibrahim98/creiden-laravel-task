<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    /**
     * Auto hash password when create/update
     * @param $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::needsRehash($value) ? \Hash::make($value) : $value;
    }

    public function items()
    {
        try {
            $items = Http::get(env('wordpress_url') . '/items/v1/items');
            $items = json_decode($items);
            if ($items->success === false) {
                return [];
            } else {
                $collection = collect($items->data);
                $filtered = $collection->where('user_id', $this->id);
                return $filtered;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return [];
        }
    }

    public function create_item($data)
    {
        try {
            $item = Http::post(env('wordpress_url') . '/items/v1/items/create', [
                'user_id' => $this->id,
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            $item = json_decode($item);
            if ($item->success === true) {
                return $item->data;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }
}
