<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int $webapp_id
 * @property int $developer_id
 * @property string $package
 * @property string $signature
 * @property int $paid
 * @property int $developer_notified
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDeveloperNotified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereWebappId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    //
}
