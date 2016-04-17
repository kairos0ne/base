Feature: Features  for Base
  In order to easily add features and scenarios to the the planning process for the site development
  I need to be able to add features and scenarios to the system through a simple visual method

  Rules:
  - I have an account
  - I am logged in
  - I have completed the brief assessment module

  Scenario: Adding the initial feature
    Given I have finished the brief module
    And have been directed to feature additions
    When I add the 'Feature' details
    Then I see the 'Feature' added to the 'Features list'
    And I am presented with the option to add rules

  Scenario: Adding the initial rule
    Given I have added the 'Feature' details
    And I have been presented with 'Rule' options
    When I add a 'Rule'
    Then I should see my 'Rule' added to the 'Rules list'
    And I am given the option to add another 'Rule'
    And be presented with the option to move on to scenarios

  Scenario: Adding an additional rule
    Given I have added my initial 'Rule'
    And I have  been given the option to add another 'Rule'
    When I add an additional 'Rule'
    Then I should see the 'Rule' apended to the 'Rules list'
    And I should be provided the options to move on
    And I should be provided the option to add another rule

  Scenario: Adding an initial scenario
    Given I have finished adding 'Rules' for the feature
    And I have been presented with options to add a scenario
    When I add a 'Scenario'
    And I add the 'Given' requirement
    And I add the 'When' requirement
    And I add the 'Then' requirement
    Then My 'Scenario' is added to the 'Scenarios list'
    And I am given with the options to add another 'Scenario'
    And I am given the option to move on

  Scenario: Adding an additional scenario
    Given I have added my first rule, I wish to add another
    When I add another 'Scenario'
    And I add the 'Given' requirement
    And I add the 'When' requirement
    And I add the 'Then' requirement
    Then The 'Scenario' should be apended to the 'Scenarios list'
    And I am given the option to add another 'Scenario'
    And I am given the option move on

  Scenario: Reviewing features, rules and scenarios
    Given I have completed all Feature, Rule and Scenario requirements. I want to review what I've done.
    When I edit a field
    Then The text after the 'Opperator' should update
    And A option to edit the 'Opperator' should be available
    And A option to delete lines should be available

  Scenario: Editing features, rules and scenarios
    Given I am at the review stage of the feature addition
    When I choose edit
    Then I am taken back to the 'Feature' or 'Rule' or 'Scenario'
    And I am given the option to add aditional 'Feature' or 'Rule' or 'Secenario'
    And I am provided the option to save and return to review

  Scenario: Deleting features, rules and scenarios
      Given I am at the review stage of the feature addition
      When  I choose to delete an indevidual line
      Then I am given an alert
      And The option to accept or decline
      When I select accept the line is deleted
      Then I am redirect to the review stage

