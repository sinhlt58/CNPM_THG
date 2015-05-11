Feature: As a user I can modify my restaurant's menu

  Background: Setup
    Given I am on "sign-in"
      And I fill in "email" with "waiter@gmail.com"
      And I fill in "password" with "123"
      And I press "Log In"
      And I am on "restaurants"
      And I press "My restaurant"
      And I am on "menu"

  Scenario: Add category with blank
    Given I am on "menu"
      When I follow " New"
        Then I should see "Name Category"
        And I fill in "fc-name" with ""
        And I press "Save changes"
      Then I should see "Empty category's name"

  Scenario: Add category with valid value
    Given I am on "menu"
      And I follow " New"
        When I fill in "fc-name" with "Ca Tram"
          And I press "Save changes"
      Then I should see "Ca Tram"

  Scenario: Changing category name
     Given I am on "menu"
      And I follow "Ca Tram 2"
     When I fill in "Category Name"
      And I press "Save"
     Then I should see "Ca Tram 2"

  Scenario: Deleting category
    Given I am on "menu"
      And I follow "Ca Tram 2"
    When I press "Delete category"
      Then I should not see "Ca Tram 2"

  Scenario: Add new item
    Given I am on "menu"
      When I follow "New Item"
        And I fill in "Name" with "Ca sau"
        And I fill in "Price" with "123"
        And I press "Save changes"
      Then I should see "Ca sau"
        And I should see "123"



