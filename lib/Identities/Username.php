<?php

namespace Magium\Auth0\Identities;

use Magium\AbstractConfigurableElement;
use Magium\Actions\WaitForPageLoaded;
use Magium\Util\Configuration\ConfigurationCollector\DefaultPropertyCollector;
use Magium\Util\Configuration\ConfigurationProviderInterface;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class Username extends AbstractConfigurableElement implements IdentityInterface
{

    const IDENTITY = 'Magium\Auth0\Identities\Username';

    public $username;
    public $password;

    protected $webDriver;

    public function __construct(
        ConfigurationProviderInterface $configurationProvider,
        DefaultPropertyCollector $collector,
        WebDriver $webDriver)
    {
        parent::__construct($configurationProvider, $collector);
        $this->webDriver = $webDriver;
    }


    public function execute()
    {
        $element = $this->webDriver->byId('a0-signin_easy_email');
        $element->clear();
        $element->sendKeys($this->username);

        $element = $this->webDriver->byId('a0-signin_easy_password');
        $element->clear();
        $element->sendKeys($this->password);

        $body = $this->webDriver->byXpath('//body');

        $element = $this->webDriver->byXpath('//div[@class="a0-action"]/button');
        $element->click();

        $this->webDriver->wait()->until(ExpectedCondition::elementRemoved($body));

    }


}
