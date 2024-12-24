<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Models;

use Ship\Parents\Models\Model;
use Ship\Parents\Models\UserModel;

/**
 * Containers\Vendor\Models\Worker
 *
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Worker truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @mixin \Eloquent
 */
final class Worker extends UserModel
{
}
