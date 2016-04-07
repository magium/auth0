<?php

namespace Magium\Auth0\Actions;

use Magium\Auth0\Identities\IdentityInterface;

class Login
{

    const ACTION = 'Magium\Auth0\Actions\Login';

    protected $identity;
    
    public function setIdentity(IdentityInterface $identityInterface)
    {
        $this->identity = $identityInterface;
    }
    
    public function execute()
    {
        if (!$this->identity instanceof IdentityInterface) {
            throw new MissingIdentityException('Missing a properly defined identity.  Set via setIdentity().');
        }
        $this->identity->execute();
    }

}