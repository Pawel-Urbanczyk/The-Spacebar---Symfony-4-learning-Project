<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use App\Entity\User;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use Behat\Mink\Driver\GoutteDriver;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
    private static $container;
    
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

//    /**
//     * @BeforeSuite
//     */
//    public static function bootstrapSymfony()
//    {
//        require __DIR__.'/../../vendor/autoload.php';
//        require __DIR__.'/../../src/Kernel.php';
//
//        $kernel = new AppKernel('test', true);
//        $kernel->boot();
//
//        self::$container = $kernel->getContainer();
//
//
//    }

//    /**
//     * @Given there is an admin user :email with password :password
//     */
//    public function thereIsAnAdminUserWithPassword($email, $password)
//    {
//        $user = new User();
//        $user->setEmail($email);
//        $user->setPassword($password);
//        $user->setRoles(array('ROLE_ADMIN'));
//
//        $em = self::$container->get('doctrine')
//        ->getManager();
//        $em->persist($user);
//        $em->flush();
//    }
//
//    /**
//     * @BeforeScenario
//     */
//    public function clearData()
//    {
//        $em = self::$container->get('doctrine')->getManager();
//        $em->createQuery('DELETE FORM AppBundle:User')->execute();
//    }
//
    /**
     * @Given I am logged in as an admin
     */
    public function iAmLoggedInAsAnAdmin()
    {
        $this->visitPath('/login');
        $this->getPage()->fillField('Email address', 'admin0@spacebar.com');
        $this->getPage()->fillField('Password', 'engage');
        $this->getPage()->pressButton('Sign in');
    }

    /**
     * @When I fill in title box with :term
     */
    public function iFillInTitleBoxWith($term)
    {
        //name="article_form[title]"
        $titleBox = $this->getPage()
            ->find('css', '[name="article_form[title]"]');

        //assertNotNull($titleBox, 'The title box was not found');

        $titleBox->setValue($term);
    }

    /**
     * @When I press submit button
     */
    public function iPressSubmitButton()
    {
        //type="submit"
        $button = $this->getPage()
            ->find('css', '[type="submit"]');

        //assertNotNull($button, 'Submit button was not found');
        $button->press();

    }

    /**
     * @When I press create button
     */
    public function iPressCreateButton()
    {
        $create = $this->getPage()
            ->findLink('Create');

        //assertNotNull($create, 'Create button was not found');

        $create->click();
    }

    /**
     * @return \Behat\Mink\Element\DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

    /**
     * @When I wait for :value
     */
    public function iWaitFor($value)
    {
        $this->getSession()->getPage()->waitFor($value);

    }


    public function canIntercept()
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof GoutteDriver) {
            throw new UnsupportedDriverActionException(
                'You need to tag the scenario with '.
                '"@mink:goutte" or "@mink:symfony2". '.
                'Intercepting the redirections is not '.
                'supported by %s', $driver
            );
        }
    }

    /**
     * @When /^I follow the redirection$/
     * @Then /^I should be redirected$/
     */
    public function iFollowTheRedirection()
    {
        $this->canIntercept();
        $client = $this->getSession()->getClient();
        $client->followRedirects(true);
        $client->followRedirect();
    }


}
