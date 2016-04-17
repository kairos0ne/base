<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
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

    /**
     * @Given I have finished the brief module
     */
    public function iHaveFinishedTheBriefModule()
    {
        throw new PendingException();
    }

    /**
     * @Given have been directed to feature additions
     */
    public function haveBeenDirectedToFeatureAdditions()
    {
        throw new PendingException();
    }

    /**
     * @When I add the :arg1 details
     */
    public function iAddTheDetails($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I see the :arg1 added to the :arg2
     */
    public function iSeeTheAddedToThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I am presented with the option to add rules
     */
    public function iAmPresentedWithTheOptionToAddRules()
    {
        throw new PendingException();
    }

    /**
     * @Given I have added the :arg1 details
     */
    public function iHaveAddedTheDetails($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have been presented with :arg1 options
     */
    public function iHaveBeenPresentedWithOptions($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I add a :arg1
     */
    public function iAddA($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see my :arg1 added to the :arg2
     */
    public function iShouldSeeMyAddedToThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I am given the option to add another :arg1
     */
    public function iAmGivenTheOptionToAddAnother($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then be presented with the option to move on to scenarios
     */
    public function bePresentedWithTheOptionToMoveOnToScenarios()
    {
        throw new PendingException();
    }

    /**
     * @Given I have added my initial :arg1
     */
    public function iHaveAddedMyInitial($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have  been given the option to add another :arg1
     */
    public function iHaveBeenGivenTheOptionToAddAnother($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I add an additional :arg1
     */
    public function iAddAnAdditional($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the :arg1 apended to the :arg2
     */
    public function iShouldSeeTheApendedToThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be provided the options to move on
     */
    public function iShouldBeProvidedTheOptionsToMoveOn()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be provided the option to add another rule
     */
    public function iShouldBeProvidedTheOptionToAddAnotherRule()
    {
        throw new PendingException();
    }

    /**
     * @Given I have finished adding :arg1 for the feature
     */
    public function iHaveFinishedAddingForTheFeature($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have been presented with options to add a scenario
     */
    public function iHaveBeenPresentedWithOptionsToAddAScenario()
    {
        throw new PendingException();
    }

    /**
     * @When I add the :arg1 requirement
     */
    public function iAddTheRequirement($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then My :arg1 is added to the :arg2
     */
    public function myIsAddedToThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I am given with the options to add another :arg1
     */
    public function iAmGivenWithTheOptionsToAddAnother($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I am given the option to move on
     */
    public function iAmGivenTheOptionToMoveOn()
    {
        throw new PendingException();
    }

    /**
     * @Given I have added my first rule, I wish to add another
     */
    public function iHaveAddedMyFirstRuleIWishToAddAnother()
    {
        throw new PendingException();
    }

    /**
     * @When I add another :arg1
     */
    public function iAddAnother($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then The :arg1 should be apended to the :arg2
     */
    public function theShouldBeApendedToThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I am given the option move on
     */
    public function iAmGivenTheOptionMoveOn()
    {
        throw new PendingException();
    }

    /**
     * @Given I have completed all Feature, Rule and Scenario requirements. I want to review what I've done.
     */
    public function iHaveCompletedAllFeatureRuleAndScenarioRequirementsIWantToReviewWhatIVeDone()
    {
        throw new PendingException();
    }

    /**
     * @When I edit a field
     */
    public function iEditAField()
    {
        throw new PendingException();
    }

    /**
     * @Then The text after the :arg1 should update
     */
    public function theTextAfterTheShouldUpdate($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then A option to edit the :arg1 should be available
     */
    public function aOptionToEditTheShouldBeAvailable($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then A option to delete lines should be available
     */
    public function aOptionToDeleteLinesShouldBeAvailable()
    {
        throw new PendingException();
    }

    /**
     * @Given I am at the review stage of the feature addition
     */
    public function iAmAtTheReviewStageOfTheFeatureAddition()
    {
        throw new PendingException();
    }

    /**
     * @When I choose edit
     */
    public function iChooseEdit()
    {
        throw new PendingException();
    }

    /**
     * @Then I am taken back to the :arg1 or :arg2 or :arg3
     */
    public function iAmTakenBackToTheOrOr($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }

    /**
     * @Then I am given the option to add aditional :arg1 or :arg2 or :arg3
     */
    public function iAmGivenTheOptionToAddAditionalOrOr($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }

    /**
     * @Then I am provided the option to save and return to review
     */
    public function iAmProvidedTheOptionToSaveAndReturnToReview()
    {
        throw new PendingException();
    }

    /**
     * @When I choose to delete an indevidual line
     */
    public function iChooseToDeleteAnIndevidualLine()
    {
        throw new PendingException();
    }

    /**
     * @Then I am given an alert
     */
    public function iAmGivenAnAlert()
    {
        throw new PendingException();
    }

    /**
     * @Then The option to accept or decline
     */
    public function theOptionToAcceptOrDecline()
    {
        throw new PendingException();
    }

    /**
     * @When I select accept the line is deleted
     */
    public function iSelectAcceptTheLineIsDeleted()
    {
        throw new PendingException();
    }

    /**
     * @Then I am redirect to the review stage
     */
    public function iAmRedirectToTheReviewStage()
    {
        throw new PendingException();
    }
}
