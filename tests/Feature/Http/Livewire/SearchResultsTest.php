<?php

declare(strict_types=1);

use App\Http\Livewire\SearchResults;
use Livewire\Livewire;
use function Tests\configureExplorerDatabase;

beforeEach(function () {
    configureExplorerDatabase();

    $this->searchDefaults = [
    // Generic
    'term'        => '2510ed26-691f-3c51-ba2f-66263ced6c93',
    'type'        => 'block',
    'dateFrom'    => null,
    'dateTo'      => null,
    // Blocks
    'totalAmountFrom'    => null,
    'totalAmountTo'      => null,
    'totalFeeFrom'       => null,
    'totalFeeTo'         => null,
    'generatorPublicKey' => null,
    // Transactions
    'transactionType' => 'transfer',
    'amountFrom'      => null,
    'amountTo'        => null,
    'feeFrom'         => null,
    'feeTo'           => null,
    'smartBridge'     => null,
    // Wallets
    'username'    => null,
    'vote'        => null,
    'balanceFrom' => null,
    'balanceTo'   => null,
];
});

it('should search for blocks', function () {
    Livewire::test(SearchResults::class)
        ->emit('searchTriggered', array_merge($this->searchDefaults, ['type' => 'block']))
        ->assertSet('state.type', 'block');
});

it('should search for transactions', function () {
    Livewire::test(SearchResults::class)
        ->emit('searchTriggered', array_merge($this->searchDefaults, ['type' => 'transaction']))
        ->assertSet('state.type', 'transaction');
});

it('should search for wallets', function () {
    Livewire::test(SearchResults::class)
        ->emit('searchTriggered', array_merge($this->searchDefaults, ['type' => 'wallet']))
        ->assertSet('state.type', 'wallet');
});