# magium/auth0

At the moment this project is a work in progress and only supports (Twitter)[https://www.github.com/magium/twitter], though it is not difficult to add additional authentication methods (and they will be added).

The purpose of this library is to provide a means of doing browser test automation using the Auth0 service from within (Magium)[http://www.magiumlib.com/].

## Configuring your Twitter account

Create a file in your testing project called /configuration/Magium/Twitter/Identities/Twitter.php that contains your Twitter creds

```
<?php

/* @var $this \Magium\Twitter\Identities\Twitter */
$this->username = 'username';
$this->password = 'password';
```

Then in your Magium test simple ask the Auth0 action to authenticate for you.

```
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
        $this->commandOpen('http://magiumlib.loc/');
        $this->byText('Log In')->click();
        $action = $this->getAction(Login::ACTION);
        /* @var $action Login */
        $action->setIdentity($this->getIdentity(Twitter::IDENTITY));
        $action->execute();

        $this->webdriver->wait(5)->until(ExpectedCondition::elementExists('login-link'));

    }

}
```

BOOM!  Authenticated.