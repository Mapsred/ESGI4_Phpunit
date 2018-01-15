Feature: Test
  Test de la page d'accueil qui est sensée afficher "Hello World"

  Scenario: La page d'accueil affiche bien "Hello World"
    Given I am on homepage
    Then I should see "Hello World"
