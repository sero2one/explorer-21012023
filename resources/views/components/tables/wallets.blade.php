<div id="wallet-list" class="w-full">
    <x-wallets.table-desktop :wallets="$wallets" />

    <x-wallets.list-mobile :wallets="$wallets" />

    <x-general.pagination :results="$wallets" class="mt-8" />

    <script>
        window.addEventListener('livewire:load', () => window.livewire.on('pageChanged', () => scrollToQuery('#block-list')));
    </script>
</div>