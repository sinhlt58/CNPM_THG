Feature: As a staff I can order item

  Background:
    Given I am on "sign-in"
      And I fill in "email" with "waiter@gmail.com"
      And I fill in "password" with "123"
      And I press "Log In"
      And I am on "restaurants"
      And I press "RESTAURANT THG"
      And I am on "order"
      And I follow "New Order"

  Scenario: On new order page
    Given I am on "new-order"



