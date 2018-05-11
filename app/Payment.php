<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int $webapp_id
 * @property string $package
 * @property string $signature
 * @property string $order_id
 * @property string $order_title
 * @property string $order_description
 * @property string $timestamp
 * @property int $amount_paid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereOrderDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereOrderTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereWebappId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    //
}
