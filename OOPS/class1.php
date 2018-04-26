<?php
class book
{
	public $price;
	public $noofpages;
	public $nameofthebook;
	function __construct($parm1,$param2)
	{
		
		$this->price=$parm1;
			$this->noofpages=$param2;
		
	}
	/* function setbookprice($assignprice)
	{
		echo $assignprice;
	$this->price=$assignprice;
	} */
	function getbook()
	{
		echo "book price.".$this->price;
		echo "book noofpages.".$this->noofpages;
	}
	
}
  
  $bookObject=new book(10,20);
  // $bookObject->setbookprice(100);
   echo "price of book is "+$bookObject->getbook();


?>
