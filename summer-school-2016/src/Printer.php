<?php
namespace SummerSchool;

class HtmlOutput implements OutputInterface {
	public function write($data) {
		$html = '<table>';
		foreach ($data as $transaction) {
	      $html .= '<tr><td>' . $transaction->getDate() . '</td>';
	      $html .= '<td>' . $transaction->getAmount() . '</td></tr>';
	    }
	    $html .= '</table>';
	    return $html;
	}
}

interface OutputInterface {
	public function write($data);
}

class Printer {
	/**
	* @var OutputInterface
	*/
	public $output;
	public function printTransactionsInMonth(Account $account){
		$report = new Report();		
		$output->write($report->getTransactionsInMonth($account));
	}
}