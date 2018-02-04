Feature: Tests
  Avant de continuer mon developpement
  En tant que bon developpeur
  Je réalise des tests de la connexion de notre site

  Background:
    Given I am on homepage
    Then I should see "Copyright: François Mathieu & Evrard Axel"
    And I should see "Ce site utilise Selenium et Behat."

  Scenario: La page d'accueil affiche bien "Hello World"
    Given I am on homepage
    Then I should see "Hello World"

  Scenario: La page content est inaccessible
    Given I am on homepage
    When I go to "/content"
    Then I should see "UnauthorizedHttpException"

  Scenario: La page login affiche bien "Inscription"
    Given I am on "/login"
    Then I should see "Inscription"

  Scenario: Verification du nombre de div
    Given I am on "/login"
    Then I should see 4 "div" elements

  Scenario: Retour au Hello World
    Given I am on "/login"
    When I follow "Retour au Hello World"
    Then I should see "Hello World"

  Scenario: Connexion invalide sur la page de login
    Given I am on "/login"
    When I fill in the following:
      | username | Toto |
      | password | root |
    And I press "Se connecter"
    Then I should see "Vos identifiants sont invalides"
    And I should not see "Vous êtes maintenant connectés"

  Scenario: Connexion réussie sur la page de login
    Given I am on "/login"
    When I fill in the following:
      | username | Toto |
      | password | 1234 |
    And I press "Se connecter"
    Then I should see "Vous êtes maintenant connectés"
    And I should not see "Vos identifiants sont invalides"