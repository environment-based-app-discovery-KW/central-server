<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WebAppDependency
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $dependency_name
 * @property string $dependency_version
 * @property string $dependency_name_version
 * @property string $code_bundle_hash
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereCodeBundleHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereDependencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereDependencyNameVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereDependencyVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebAppDependency whereUpdatedAt($value)
 */
class WebAppDependency extends Model
{
    protected $connection = 'app-repo-server';
}
