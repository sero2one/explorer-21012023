<?php

declare(strict_types=1);

use App\Services\CryptoCompare;
use Illuminate\Support\Facades\Http;

use function Spatie\Snapshots\assertMatchesSnapshot;

it('should fetch the price for the given pair', function () {
    Http::fake([
        'cryptocompare.com/*' => Http::response(['USD' => 0.2907]),
    ]);

    expect(CryptoCompare::price('ARK', 'USD'))->toBe(0.2907);
});

it('should fetch the historical prices for the given pair', function () {
    Http::fake([
        'cryptocompare.com/*' => Http::response(json_decode(file_get_contents(base_path('tests/fixtures/cryptocompare/historical.json')), true)),
    ]);

    assertMatchesSnapshot(CryptoCompare::historical('ARK', 'USD'));
});