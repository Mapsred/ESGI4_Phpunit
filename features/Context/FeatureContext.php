<?php

namespace Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * @BeforeScenario @logged_in
     * @param BeforeScenarioScope $scope
     */
    public function before(BeforeScenarioScope $scope)
    {
        $this->assertIsLoggedIn("Toto", "1234");
    }

    /**
     * Clicks link with specified id|title|alt|text
     * Example: When I follow "Log In"
     * Example: And I follow "Log In"
     *
     * @Given /^I am logged in with "([^"]*)" and "([^"]*)"$/
     * @param string $username
     * @param string $password
     */
    public function assertIsLoggedIn($username, $password)
    {
        $this->visitPath("/login");
        $this->fillFields(new TableNode([
            ['username', $username], ['password', $password]
        ]));

        $this->pressButton("Se connecter");
    }
}
