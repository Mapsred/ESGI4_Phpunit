Feature: Hello World
  Avant de me lancer tout les tests
  En tant que developpeur
  Je test la page d'accueil qui est censée afficher "Hello World"

  Background:
    Given I am on homepage
    Then I should see "Copyright: François Mathieu & Evrard Axel"
    And I should see "Ce site utilise Selenium et Behat."

  Scenario: La page d'accueil affiche bien "Hello World"
    Given I am on homepage
    Then I should see "Hello World"

  Scenario: La page d'accueil affiche bien "Hello World"
    Given I am on homepage
    Then I should be on "/"
    And I should not see "Coucou"