<?php
namespace Step\Acceptance;

class Admin extends \AcceptanceTester
{

    public function loginAsAdmin()
    {
        $I = $this;        
        $I->amOnPage('/index.php?r=home/login');
        $I->fillField('login[login]', 'chipv');
        $I->fillField('login[password]', '1234');
        $I->click('Submit');

    }

}
