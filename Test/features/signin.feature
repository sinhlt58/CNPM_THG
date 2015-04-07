Feature: As a waiter/waitress (already had an account in database)
         I could use my email and password to login.

  Background:
    Given I am on "sign-in"
      And I should see "USERS LOGIN"
      And I should see "Email address"
      And I should see "Password"
      And I should see "Submit"

  @javascript
  Scenario: Login successfully
    When I fill in "email" with "thg@gmail.com"
      And I fill in "password" with "123"
      And I press "Submit"
    Then I should be on "restaurants"
      And I should see "Choose one restaurant that you work for."
      And I should see "RESTAURANT THG"
