<?php

namespace App\ValueObjects;

use App\Models\Transaction;
use Carbon\Carbon;

/**
 * Each transaction can have assigned infinitely many book days (theoretically) - so when returning a list of scheduled
 * transactions it is useful to know *when* they are incoming. We do it straight away - by having an object which holds
 * both information.
 */
class ScheduledTransaction {

	/**
	 * @var int|null
	 */
	protected $id;

	/**
	 * @var Transaction
	 */
	protected $transaction;

	/**
	 * @var Carbon
	 */
	protected $date;

	/**
	 * @param int|null $id
	 * @param Transaction $transaction
	 * @param Carbon $date
	 */
	public function __construct(
		?int $id,
		Transaction $transaction,
		Carbon $date
	) {
		$this->id = $id;
		$this->transaction = $transaction;
		$this->date = $date;
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->id;
	}

	/**
	 * @return Transaction
	 */
	public function getTransaction(): Transaction {
		return $this->transaction;
	}

	/**
	 * @return Carbon
	 */
	public function getDate(): Carbon {
		return $this->date;
	}

}