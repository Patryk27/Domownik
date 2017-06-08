<?php

namespace App\Modules\Finances\Services\Transaction;

use App\Modules\Finances\Models\Transaction;
use App\ServiceContracts\BasicSearchContract;
use Carbon\Carbon;
use Illuminate\Support\Collection;

interface HistoryCollectorServiceContract
	extends BasicSearchContract {

	const
		GROUP_MODE_DAILY = 'daily',
		GROUP_MODE_WEEKLY = 'weekly',
		GROUP_MODE_MONTHLY = 'monthly',
		GROUP_MODE_YEARLY = 'yearly';

	const
		SORT_DIRECTION_ASCENDING = 'asc',
		SORT_DIRECTION_DESCENDING = 'desc';

	/**
	 * Returns a list of transactions of which every has the 'periodicity' field set to according (one shot) value.
	 * @return Collection|Transaction[]
	 */
	public function getRows(): Collection;

	/**
	 * Returns simple rows prepared for the charts.
	 * @return array
	 */
	public function getRowsForChart(): array;

	/**
	 * @return string
	 */
	public function getParentType(): string;

	/**
	 * @param string $parentType
	 * @return HistoryCollectorServiceContract
	 */
	public function setParentType(string $parentType): HistoryCollectorServiceContract;

	/**
	 * @return int
	 */
	public function getParentId(): int;

	/**
	 * @param int $parentId
	 * @return HistoryCollectorServiceContract
	 */
	public function setParentId(int $parentId): HistoryCollectorServiceContract;

	/**
	 * @return string
	 */
	public function getGroupMode(): string;

	/**
	 * @param string $groupMode
	 * @return HistoryCollectorServiceContract
	 */
	public function setGroupMode(string $groupMode): HistoryCollectorServiceContract;

	/**
	 * @return Carbon|null
	 */
	public function getBeginDate();

	/**
	 * @param Carbon|null $dateBegin
	 * @return HistoryCollectorServiceContract
	 */
	public function setBeginDate($beginDate): HistoryCollectorServiceContract;

	/**
	 * @return Carbon|null
	 */
	public function getEndDate();

	/**
	 * @param Carbon|null $dateBegin
	 * @return HistoryCollectorServiceContract
	 */
	public function setEndDate($endDate): HistoryCollectorServiceContract;

	/**
	 * @return string
	 */
	public function getSortDirection(): string;

	/**
	 * @param string $sortDirection
	 * @return HistoryCollectorServiceContract
	 */
	public function setSortDirection(string $sortDirection): HistoryCollectorServiceContract;

}