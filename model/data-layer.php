<?php

/**
 *Data layer class, this class holds all things data, like our arrays of
 * food/drink
 */
class DataLayer
{
    /**
     * private DBH, Not sure why this is here
     * dbh is deffined allready in config.php
     *
     * @var int
     */
    private $_dbh;

    /**
     *This construct can likely be remove but not my edit, DB processing is
     * done in controller/index
     */
    function __construct()
	{
		//require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');
		$dbh = 5;
		$this->_dbh = $dbh;
	}

	// ---------- Get order options ----------

    /**
     * Get food
     * @return string[]
     */
    static function getFood() {
		return array("Chicken Tenders" => "8.00",
			"Turkey Club" => "8.50",
			"Fresh Salmon" => "12.00",
			"Mega Philly Cheese Melt" => "8.00",
			"1/3lb Cheeseburger" => "6.00",
			"Crazy Spicy Skillet" => "10.00",
			"Sirloin Steak & Eggs" => "11.00",
			"Supreme Skillet" => "13.50",
			"Smothered Cheese Fries" => "8.50",
			"Zesty Nachos" => "6.00",
			"Sweet Tangy Bacon Burger" => "15.00"
		);
	}


    /**
     * Get drinks
     * @return string[]
     */
    static function getDrinks() {
		return array("Bud Light" => "2.00",
			"Busch" => "2.00",
			"Sam Adams" => "3.00",
			"Corona" => "1.50",
			"Mojito" => "5.00",
			"Cosmopolitan" => "5.00",
			"Negroni" => "5.00",
			"Whiskey Sour" => "6.00"
		);
	}
}