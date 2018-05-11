<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WebApp
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereUpdatedAt($value)
 * @property int $developer_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebApp whereDeveloperId($value)
 */
class WebApp extends Model
{
    protected $connection = 'app-repo-server';

    public static function findByName($name)
    {
        return WebApp::whereName($name)->first();
    }
}
