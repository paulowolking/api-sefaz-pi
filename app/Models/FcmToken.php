<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FcmToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string $platform
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FcmToken whereUserId($value)
 * @mixin \Eloquent
 */
class FcmToken extends Model
{
    protected $table = 'fcm_tokens';

    protected $fillable = ['user_id', 'token', 'platform'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
