<?php

namespace App\Services\Search;

use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;

interface SearchContract {

	/**
	 * @return $this
	 */
	public function reset();

	/**
	 * Returns all the matching rows.
	 * @return Collection
	 */
	public function get(): Collection;

	/**
	 * @return QueryBuilder
	 */
	public function getQueryBuilder(): QueryBuilder;

}