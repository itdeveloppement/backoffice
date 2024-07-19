# creation user security
symfony console make:user
symfony console make:migration
symfony make console d:m:m

# creation du formulaire de creation de compte
symfony console make:registration-form

# autentification
symfony console make:security:form-login

# modifier dans conf / pakages / security.yaml

security:
    # https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords
    password_hashers:
        Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface: 'auto'
    # https://symfony.com/doc/current/security.html#loading-the-user-the-user-provider
    providers:
        # used to reload user from session & other features (e.g. switch_user)
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: app_user_provider
            form_login:
                login_path: app_login
                check_path: app_login
                enable_csrf: true
                # une fois que je suis loguer je vais vers 
                default_target_path: app

            logout:
                path: app_logout
                # where to redirect after logout
                target: login

            # activate different ways to authenticate
            # https://symfony.com/doc/current/security.html#the-firewall

            # https://symfony.com/doc/current/security/impersonating_user.html
            # switch_user: true

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }

when@test:
    security:
        password_hashers:
            # By default, password hashers are resource intensive and take time. This is
            # important to generate secure password hashes. In tests however, secure hashes
            # are not important, waste resources and increase test times. The following
            # reduces the work factor to the lowest possible values.
            Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface:
                algorithm: auto
                cost: 4 # Lowest possible value for bcrypt
                time_cost: 3 # Lowest possible value for argon
                memory_cost: 10 # Lowest possible value for argon

## Chemin apres s'etre connecté (a modifier dans security.yaml)
A PRECISER DANS LA PARTIE /  form_login:
une fois que je suis loguer je vais vers 
                default_target_path: app

login_path : Le chemin (URL) du formulaire de connexion. Cela indique où les utilisateurs doivent se rendre pour se connecter.

check_path : Le chemin (URL) auquel les informations de connexion seront envoyées pour validation. Symfony vérifie les informations d'identification (comme le nom d'utilisateur et le mot de passe) à cet endroit.

enable_csrf : Indique si la protection CSRF (Cross-Site Request Forgery) doit être activée pour le formulaire de connexion. Par défaut, c'est true, ce qui ajoute une protection contre les attaques CSRF au formulaire de connexion.

default_target_path : Spécifie l'URL à laquelle les utilisateurs seront redirigés après une connexion réussie. Si vous ne définissez pas cette option, Symfony redirige l'utilisateur vers la dernière URL qu'il a tentée d'accéder avant de se connecter, ou vers la page d'accueil de l'application si aucune URL n'est spécifiée.

## Attribution (il faut autoriser toutes les routes) (a modifier dans security.yaml)
    - attribution pour l'acces a certaine route en fonction du role de l'utilisateur
    - acces_controle :
        - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }
  
On stock dans un tableau json le role dans la table role
  - dans la base il faut indiquer les roles ds le champ role (tableau des role separé par une ,) ["ROLE_ADMIN"] 

IMPORTANT
un uilisateur connecté a toujours ele role user
un admin a un role user et admin

## Dans le template (a intégrer dans le template)
si l'utilisateur est connecté app.user existe c a d qu il contien les information de l'utilisateur.

    {% if app.user %}
    j'affiche un moreceu de template
    {% iendif %}

si l'utilisateur est connecté en tant que : (indiquer le role)
    {% if is_granted["ROLE_ADMIN"] %}
    j'affiche un moreceu de template
    {% endif %}

# A modifier dans RegisterControleur 
return $this->redirectToRoute('app_login');

route register
login





