<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WebAppDeploymentLocation
 *
 * @property int $id
 * @property int $web_app_id
 * @property float $latitude
 * @property float $longitude
 * @property float $radius_m
 * @property string $launch_params_json
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereLaunchParamsJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereRadiusM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDeploymentLocation whereWebAppId($value)
 * @mixin \Eloquent
 */
class WebAppDeploymentLocation extends Model
{
    protected $connection = 'app-repo-server';
}
