<?php

/**
 * Controller Class, called from Index controls routing and page logic
 */
class Controller
{
    /**
     * f3 hive var
     * @var
     */
    private $_f3;

    /**
     * f3 default constructor
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * home routing
     * @return void
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * vip page routing
     * @return void
     */
    function vip()
    {
        $view = new Template();
        echo $view->render('views/vip.html');
    }

    /**
     * Checks order status via order status page
     * @return void
     */
    function orderStatus()
    {
        $view = new Template();
        echo $view->render('views/status.html');
    }

    /**
     * order page routing
     * @return void
     */
    function order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $food = "None";

            if (isset($_POST['food'])) {
                if (!empty($_POST['food'])) {
                    $food = implode(", ", $_POST['food']);
                    // Total cost
                    $_SESSION['total'] = $_SESSION['total'] + 8;
                }
            }
            $_SESSION['food'] = $food;

            $drinks = "None";


            if (isset($_POST['drinks'])) {
                if (!empty($_POST['drinks'])) {
                    $drinks = implode(", ", $_POST['drinks']);
                    // Total cost
                    $_SESSION['total'] = $_SESSION['total'] + 2;
                }
            }


            // This is for the CSS in order. Increments ID (food1,food2,food3...)
            $drinkValue = 0;
            $drinkValue = $drinkValue + 1;
            $_SESSION['drink'] = $_POST[('drink' . $drinkValue)];

            $foodValue = 0;
            $foodValue = $foodValue + 1;
            $_SESSION['foods'] = $_POST[('foods' . $foodValue)];


            $_SESSION['drinks'] = $drinks;
            $_SESSION['CT'] = $_POST['CT'];



            if (empty($this->_f3->get('errors'))) {
				var_dump($_SESSION);
                header('location: confirmation');
            }
        }

        $this->_f3->set('food', DataLayer::getFood());
        $this->_f3->set('foodPrice', DataLayer::getFoodPrices());

        $this->_f3->set('drinks', DataLayer::getDrinks());
        $this->_f3->set('drinkPrice', DataLayer::getDrinkPrices());

        $view = new Template();
        echo $view->render('views/order.html');
    }

    /**
     * order confirmation page routing
     * @return void
     */
    function confirmation()
    {
        var_dump($_SESSION);
        $view = new Template();
        echo $view->render('views/confirmation.html');
        session_destroy();
    }

    /**
     * Contact us page routing
     * @return void
     */
    function contact()
    {
        $view = new Template();
        echo $view->render('views/suggestionContact.html');
    }

    /**
     * Signup page routing
     * @return void
     */
    function signUp()
    {
        $view = new Template();
        echo $view->render('views/signUp.html');
    }

    /**
     * Sign in Page routing
     * @return void
     */
    function signIn()
    {
        $view = new Template();
        echo $view->render('views/signIn.html');
    }

    /**
     * Login poge routing
     * @return void
     */
    function logIn()
    {
        $view = new Template();
        echo $view->render('views/login.php');
    }
}