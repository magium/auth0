<?php

namespace Tests\Magium\Auth0;

use Facebook\WebDriver\WebDriverBy;
use Magium\AbstractTestCase;
use Magium\Auth0\Actions\Login;
use Magium\Auth0\Identities\Twitter;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class TwitterTest extends AbstractTestCase
{

    public function testTwitterAuth()
    {

        // This part of the test will not work on your system.  You will need to change it.
        $this->commandOpen('http://magiumlib.loc/');
        $this->byText('Log In')->click();

        // This part of the test should work on your system.  If it doesn't work then something is probably wrong.

        // Make sure you configure your twitter account in the file /configuration/Magium/Twitter/Identities/Twitter.php

        /*
         * $this->username = 'username';
         * $this->password = 'password';
         */

        $action = $this->getAction(Login::ACTION);
        /* @var $action Login */
        $action->setIdentity($this->getIdentity(Twitter::IDENTITY));
        $action->execute();

        $this->webdriver->wait(5)->until(ExpectedCondition::elementExists('login-link'));

    }

}