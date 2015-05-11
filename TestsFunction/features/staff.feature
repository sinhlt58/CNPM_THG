Feature: As a admin of my restaurant
         I should be able to add staffs

  Background: Setup
    Given I am on "sign-in"
      And I fill in "email" with "waiter@gmail.com"
      And I fill in "password" with "123"
      And I press "Log In"
      And I should be on "restaurants"
      And I press "RESTAURANT THG"
      And I follow "Staff"


  Scenario: Empty email
    Given I am on "staff"
    When I fill in "search_email" with ""
      And I press "Add"
    Then I should see "empty email"


  Scenario: Staff has been already exited
    Given I am on "staff"
    When I fill in "search_email" with "thg@gmail.com"
      And I press "Add"
    Then I should see "has been already in your list"


  Scenario: Email does not exit
    Given I am on "staff"
    When I fill in "search_email" with "hahah@gmail.com"
      And I press "Add"
    Then I should see "does not exit"


  Scenario: Add staff successfully
    Given I am on "staff"
    When I fill in "search_email" with "waiter1@gmail.com"
      And I press "Add"
    Then I should see "add successfully"
      And I should see "waiter1@gmail.com"
      And I should see "waiter 1"






