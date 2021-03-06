<?php

namespace App\Services\Transaction\Periodicity\Parser\Matchers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DailyMatcher
	implements MatcherContract {

	/**
	 * @var Carbon
	 */
	protected $dateFrom;

	/**
	 * @var Carbon
	 */
	protected $dateTo;

	/**
	 * @inheritDoc
	 */
	public function loadTransaction(Transaction $transaction): MatcherContract {
		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function filterRange(Carbon $dateFrom, Carbon $dateTo): MatcherContract {
		$this->dateFrom = $dateFrom;
		$this->dateTo = $dateTo;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getMatchingDates(): Collection {
		$result = new Collection();

		$date = $this->dateFrom->copy();

		while ($date <= $this->dateTo) {
			$result->push($date->copy());
			$date->addDay(1);
		}

		return $result;
	}

}