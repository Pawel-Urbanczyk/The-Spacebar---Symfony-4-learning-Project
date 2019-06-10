Feature: Article Admin Area
  In order to maintain the article sho on the site
  As a admin user
  I need to be able to add/edit/delete articles


  Background:
    Given I am logged in as an admin

  Scenario: List of all articles
    And I am on "/admin/article"
    Then I should see "All Articles"

  Scenario: Add new article
    When I am on "/admin/article"
    And I press create button
    When I fill in title box with "Letters"
    And I fill in "article_form[content]" with "ABC"
    And I select "Near a star" from "article_form[location]"
 #  And I wait for the select field to load
 #  And I select "Polaris" from "article_form[specificLocationName]"
    And I fill in "article_form[author]" with "admin0@spacebar.com"
    And I press "Create"
    And I should be on "/admin/article"
    Then I should see "Article Created!"
    And I should see "Letters"

  Scenario: Edit existing article
    When I am on "/admin/article"
    And I click Edit in "Letters" row
    Then I should see "Edit this Article!"
    Then I fill in title box with "Numbers"
    And I press "Update"
    Then I should see "Article Updated!"



