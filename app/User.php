<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\User
 *
 * @property int $id
 * @property string $public_key
 * @property string $info_json
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereInfoJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePublicKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    public static function findByPublicKey($publicKey)
    {
        $publicKey = preg_replace('/\s/', '', $publicKey);
        $user = User::wherePublicKey($publicKey)->first();
        if (!$user) {
            $user = new User();
            $user->name = "";
            $user->info_json = "";
            $user->public_key = $publicKey;
            $user->save();
        }
        return $user;
    }
}
