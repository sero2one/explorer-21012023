@if ($model->isKnown() || $model->isOwnedByExchange())
    <div>
        @lang('labels.wallet_type')

        <div class="flex flex-col space-y-4">
            @if ($model->isKnown())
                <div>
                    <div class="flex items-center space-x-4">
                        <x-icon name="app-verified" style="secondary" />

                        <span>@lang('general.verified_address')</span>
                    </div>
                </div>
            @endif

            @if ($model->isOwnedByExchange())
                <div>
                    <div class="flex items-center space-x-4">
                        <x-icon name="app-exchange" style="secondary" />

                        <span>@lang('general.exchange')</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
