Feature: Test
  Test de la page d'accueil qui est censée afficher "Hello World"

  Scenario: La page d'accueil affiche bien "Hello World"
    Given I am on homepage
    Then I should see "Hello World"

  Scenario: La page content est inaccessible
    Given I am on "/content"
    Then I should see "UnauthorizedHttpException"

  Scenario: La page login affiche bien "Inscription"
    Given I am on "/login"
    Then I should see "Inscription"

  Scenario: Connexion invalide sur la page de login
    Given I am on "/login"
    When I fill in the following:
      | username | Toto |
      | password | root |
    And I press "Se connecter"
    Then I should see "Vos identifiants sont invalides"

  Scenario: Connexion réussie sur la page de login
    Given I am on "/login"
    When I fill in the following:
      | username | Toto |
      | password | 1234 |
    And I press "Se connecter"
    Then I should see "Vous êtes maintenant connectés"

  @logged_in
  Scenario: Affichage de la page "content"
    Given I am on "/content"
    Then the response should contain "Se déconnecter"
    Then I should see "1234"