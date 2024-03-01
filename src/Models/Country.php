<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\Country
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @property int $country_id
 * @property string $iso
 * @property string $iso3
 * @property string $name
 * @property string $nice_name
 * @property int $phone_code
 * @property string $phone_mask
 * @property string $currency
 * @property string $flag
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNiceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhoneMask($value)
 * @mixin \Eloquent
 */
class Country extends AbstractModel
{
}
