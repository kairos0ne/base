Feature: Command Interface for Base
  In order to navigate without a mouse and I require a an interface to find and create items on the fly
  I am logged in as user
  I need to be able to add items by calling an interface to capture text

  Rules:
  - I have an account
  - I am logged in

  Scenario: Add items through a command inteface from anywhere within the site.
    Given I have that I am logged in
    And I want to perform a task on the site
    When I press a key combination
    Then I see an input based interface appear
    And I should see suggested commands based on where I am on the site
    And I should see command based tips for available tasks

  Scenario: Select command from suggested list of commands with the mouse
    Given that I am logged in
    And have the command interface open
    When I select a suggested command
    Then I am sent to the correct page
    And I am presented with the required information based on my selection

