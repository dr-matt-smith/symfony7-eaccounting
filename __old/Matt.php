<?php

namespace Itb\EaccountingBundle\Controller;

class Matt
{
	private $credit = 0;
	private $debit = 0;
	
	public function getCredit(){	return $this->credit;	}
	public function getDebit(){ return $this->debit;	}
	
	public function zeroTotals()
	{
		$this->credit = 0;
		$this->debit = 0;
	}
	
	public function addToCredit( $n )
	{
		$this->credit += $n;		
	}
	
	public function addToDebit( $n )
	{
		$this->debit += $n;
	}

}

/*

class Matt
{
	private static $credit = 0;
	private static $debit = 0;
	
	public static function getCredit(){	return self::$credit;	}
	public static function getDebit(){	return self::$debit;	}
	
	public static function zeroTotals()
	{
		self::$credit = 0;
		self::$debit = 0;
	}
	
	public static function addToCredit( $n )
	{
		self::$credit += $n;		
	}
	
	public static function addToDebit( $n )
	{
		self::$debit += $n;
	}

}
*/
