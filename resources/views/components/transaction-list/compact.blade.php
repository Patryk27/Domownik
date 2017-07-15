@php
    /**
      * @var \App\ValueObjects\ScheduledTransaction[] $transactions
      * @var string[] $transactionButtons
      */
@endphp

@php
    if (!isset($showCounter)) {
        $showCounter = false;
    }
@endphp

<table class="table table-hover table-striped transaction-list compact">
    <thead>
    <tr>
        @if($showCounter)
            <th>{{ __('components/table.head.row-counter') }}</th>
        @endif
        <th>{{ __('components/transaction-list.transaction-date') }}</th>
        <th>{{ __('components/transaction-list.transaction-name') }}</th>
        <th>{{ __('components/transaction-list.transaction-amount') }}</th>

        @if(isset($transactionButtons))
            <th></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @php($counter = 0)
    @foreach ($transactions as $item)
        @php
            /**
              * @var \App\Models\Transaction|\App\ValueObjects\ScheduledTransaction $transaction
              */

            if ($item instanceof \App\ValueObjects\ScheduledTransaction) {
                $transaction = $item->getTransaction();
                $date = $item->getDate();
            } else {
                $transaction = $item;
                $date = $item->periodicity->date;
            }

            $transactionPresenter = $transaction->getPresenter();
        @endphp
        <tr>
            @if($showCounter)
                <td>{{ ++$counter }}</td>
            @endif
            <td>{{ Date::format('%Y-%m-%e %a', $date) }}</td>
            <td>{{ $transaction->name }}</td>
            <td>
                @include('components.transaction.value', [
                    'transaction' => $transaction,
                ])
            </td>
            @if(isset($transactionButtons))
                <td class="transaction-list-buttons">
                    @if (in_array('edit-parent', $transactionButtons) && isset($transaction->parent_transaction_id))
                        <a class="btn btn-xs btn-default" href="{{ $transactionPresenter->getParentEditUrl() }}">
                            <i class="fa fa-level-up"></i>
                        </a>
                    @endif

                    @if (in_array('edit', $transactionButtons))
                        <a class="btn btn-xs btn-info" href="{{ $transactionPresenter->getEditUrl() }}">
                            <i class="fa fa-cog"></i>
                        </a>
                    @endif
                </td>
            @endif
        </tr>

        @php(++$counter)
    @endforeach
    </tbody>
</table>