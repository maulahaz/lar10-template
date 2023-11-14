<?php

namespace App\Services\V1;
use Illuminate\Http\Request;

class EmployeeQuery{
	protected $safeParams = [
		'name' => ['eq'],
		'phone' => ['eq'],
		'address' => ['eq'],
		'username' => ['eq'] //--['eq','gt','lt']
	];

	protected $columnMap = ['name' => 'name'];

	protected $operatorMap = [
		'eq' => '=',
		'gt' => '>',
		'lt' => '<',
		'gte' => '>=',
		'lte' => '<='
	];

	public function transform(Request $request)
	{
		$eloQuery = [];
		foreach ($this->safeParams as $par => $operators) {
			$query = $request->query($par);

			if(!isset($query)){
				continue;
			}

			$column = $this->columnMap[$par] ?? $par;

			foreach ($operators as $opr) {
				if(isset($query[$opr])){
					$eloQuery[] = [$column, $this->operatorMap[$opr], $query[$opr]];
				}
			}
		}
		return $eloQuery;
	}

}