<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WebAppHasWebAppDependency
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $web_app_version_id
 * @property int $web_app_dependency_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppHasWebAppDependency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppHasWebAppDependency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppHasWebAppDependency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppHasWebAppDependency whereWebAppDependencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppHasWebAppDependency whereWebAppVersionId($value)
 */
class WebAppHasWebAppDependency extends Model
{
    protected $connection = 'app-repo-server';
}
