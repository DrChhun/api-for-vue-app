<?php

namespace App\ApiQuery;

use Illuminate\Http\Request;

class Filter {
    protected $safeParams = [
        'id' => ['eq', 'gt', 'lt'],
        'title' => ['eq'], //we decalear this to make sense cus title should be equal not greater or less than
        'author' => ['eq'],
        'totalPage' => ['eq', 'gt', 'lt'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];

    public function combine(Request $request) {
        $eloQuery = []; //array to pass into eloquent

        foreach($this->safeParams as $params => $operators) { //loop all data in safeParams array value
            // dd($params);
            $query = $request->query($params);

            if (!isset($query)) { //check query variable
                continue;
            }

            $column = $this->columnMap[$params] ?? $params;

            foreach($operators as $operator) {
                // dd($operator);
                if (isset($query[$operator])) { //chech if query isn't null
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}