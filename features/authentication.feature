Feature: Authentication
  In order to gain access to the management area
  As a admin user
  I need to be able to login and logout
  
  Scenario: Logging In
    Given I am on "/"
    Then I follow "Login"
    And I fill in "Email address" with "admin0@spacebar.com"
    And I fill in "Password" with "engage"
    And I press "Sign in"
    Then I should see "Logout"

  Scenario: Logging Out
    Given I am logged in as an admin
    Then I follow "Logout"
    Then I should see "Login"
