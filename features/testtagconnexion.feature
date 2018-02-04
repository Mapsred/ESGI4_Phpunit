Feature: Test Tag
  Pour continuer mes tests
  En tant que bon developpeur
  Je réalise des tests avec des tags

  Background:
    Given I am on homepage
    Then I should see "Copyright: François Mathieu & Evrard Axel"
    And I should see "Ce site utilise Selenium et Behat."

  @logged_in
  Scenario: Affichage de la page "content"
    Given I am on "/content"
    Then the response should contain "Se déconnecter"
    And I should see "Toto"
    And I should see "1234"

  @logged_in
  Scenario: Utilisation du reload
    Given I am on "/content"
    Then the response should contain "Se déconnecter"
    And I reload the page
    And I should not see "Vous êtes maintenant connectés"
    And I should see "Toto"
    And I should see "1234"

  @logged_in
  Scenario: Affichage de la page "content"
    Given I am on "/content"
    Then the response should contain "Se déconnecter"
    And I move backward one page
    And I move forward one page
    And I should not see "Se connecté"
    And I should see "Se déconnecter"

  @logged_in
  Scenario: Affichage de la page "content"
    Given I am on "/content"
    Then I should see 3 "li" elements

  @logged_in
  Scenario: Affichage de l'url de la page
    Given I am on "/content"
    Then print current URL