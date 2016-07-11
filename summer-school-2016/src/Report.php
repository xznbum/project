<?php
namespace SummerSchool;

class Report
{
	public function getSpentInPeriod(Account $account,\DateTime $periodStart, \DateTime $periodEnd) {
	    $spent = 0;
	    foreach ($account->getTransactions() as $transaction) {
	      if($transaction->getDate() >= $periodStart && $transaction->getDate() <= $periodEnd ){
	        $spent = $spent + $transaction->getAmount();
	      }
	    }
	    return $spent;
  	}

  public function getTransactionsInMonth(Account $account) {
		$transactions = array();
		$date = new DateTime();
		$date->modify('-1 month');
		foreach ($account->getTransactions() as $transaction) {
	      if($transaction->getDate() >= $date){
	        array_push($transactions, $transaction);
	      }
	    }
	    return $transactions;
	}
}