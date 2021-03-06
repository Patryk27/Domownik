<?php

namespace App\Services\Transaction\Periodicity\Parser\Matchers;

use App\Models\Transaction;
use App\Models\TransactionPeriodicityMonthly;
use App\Repositories\Contracts\TransactionPeriodicityRepositoryContract;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class MonthlyMatcher
	implements MatcherContract {

	/**
	 * @var TransactionPeriodicityRepositoryContract
	 */
	protected $transactionPeriodicityRepository;

	/**
	 * @var Collection|int[]
	 */
	protected $dayNumbers;

	/**
	 * @var Carbon[]
	 */
	public $dates;

	/**
	 * @param TransactionPeriodicityRepositoryContract $transactionPeriodicityRepository
	 */
	public function __construct(
		TransactionPeriodicityRepositoryContract $transactionPeriodicityRepository
	) {
		$this->transactionPeriodicityRepository = $transactionPeriodicityRepository;
	}

	/**
	 * @inheritDoc
	 */
	public function loadTransaction(Transaction $transaction): MatcherContract {
		$rows = $this->transactionPeriodicityRepository->getMonthliesByTransactionId($transaction->id);

		$this->dayNumbers = $rows->map(function (TransactionPeriodicityMonthly $row) {
			return $row->day;
		});

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function filterRange(Carbon $dateFrom, Carbon $dateTo): MatcherContract {
		$this->dates = [];

		$currentDay = $dateFrom->copy();

		while ($currentDay <= $dateTo) {
			if ($this->dayNumbers->contains($currentDay->day)) {
				$this->dates[] = $currentDay->copy();
			}

			$currentDay->addDay();
		}

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getMatchingDates(): Collection {
		return new Collection($this->dates);
	}

}