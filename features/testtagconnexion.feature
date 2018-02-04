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
    Then I should see "Toto"
    And I should see "1234"