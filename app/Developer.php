<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Developer
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $desc
 * @property string $avatar_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Developer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Developer extends Model
{
    //
}
