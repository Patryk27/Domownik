@php
    /**
     * @var \App\Models\Budget $budget
     * @var \Illuminate\Support\Collection|\App\ValueObjects\ScheduledTransaction[] $recentTransactions
     * @var \Illuminate\Support\Collection|\App\ValueObjects\ScheduledTransaction[] $incomingTransactions
     */
@endphp

<div class="row">
    {{-- Recently booked transactions --}}
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-history"></i>&nbsp;
                    {{ __('views/finances/budgets/show.recent-transactions.header') }}

                    <a class="btn btn-xs btn-default pull-right"
                       href="{{ route('finances.budgets.transactions.booked', $budget->id) }}">
                        {{ __('views/finances/budgets/show.recent-transactions.show-more') }}
                    </a>
                </div>
            </div>

            <div class="panel-body">
                @include('components.transaction.list', [
                    'transactions' => $recentTransactions,
                    'options' => [
                        'buttons' => ['edit'],
                    ],
                ])
            </div>
        </div>
    </div>

    {{-- Incoming transactions --}}
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>&nbsp;
                    {{ __('views/finances/budgets/show.incoming-transactions.header') }}

                    <a class="btn btn-xs btn-default pull-right"
                       href="{{ route('finances.budgets.transactions.scheduled', $budget->id) }}">
                        {{ __('views/finances/budgets/show.incoming-transactions.show-more') }}
                    </a>
                </div>
            </div>

            <div class="panel-body">
                @include('components.transaction.list', [
                    'transactions' => $incomingTransactions,
                    'options' => [
                        'buttons' => ['edit'],
                    ],
                ])
            </div>
        </div>
    </div>
</div>