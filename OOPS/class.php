<?php
class Fruit
{
	public $color="red";
	function gettaste(){
		echo "taste is good";
		
	}
	function getcolor($color)
	{
		echo "color of fruit is ".$color;
	}
}
$fruitobject=new Fruit();
echo $fruitobject->color;
echo $fruitobject->gettaste();
$fruitcolor="voilet";
echo $fruitobject->getcolor($fruitcolor);
?>