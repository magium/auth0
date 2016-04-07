<?php

namespace Magium\Auth0\Identities;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Magium\Twitter\Actions\AuthenticateTwitter;

class Twitter implements IdentityInterface
{
    const IDENTITY = 'Magium\Auth0\Identities\Twitter';

    protected $action;
    protected $webDriver;

    public function __construct(
        AuthenticateTwitter $twitter,
        WebDriver   $webDriver
    )
    {
        $this->action = $twitter;
        $this->webDriver = $webDriver;
    }

    
    public function execute()
    {
        $xpath = '//div[@data-strategy="twitter"]';
        $this->webDriver->findElement(WebDriverBy::xpath($xpath))->click();
        $this->action->execute(); 

    }

}