<?php
namespace SummerSchool;

class Account {
  private $name;
  private $money;
  private $transactions;

  public function __construct($name, $initialMoney = 0){
    $this->name = $name;
    $this->money = $initialMoney;
    $this->transactions = [];
  }

  public function getMoney() {
    return $this->money;
  }

  public function addTransaction(Transaction $transaction) {
    $this->transactions[] = $transaction;
    $this->money = $this->money - $transaction->getAmount();
  }

  public function getTransactions() {
    return $this->transactions;
  }

}
