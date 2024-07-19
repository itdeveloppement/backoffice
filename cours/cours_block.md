Les blocs dans Twig sont des sections de votre template que vous pouvez remplacer dans des templates enfants. Cela vous permet de définir une structure de base dans un template principal (souvent appelé layout ou base template) et de personnaliser ou de compléter cette structure dans des templates enfants sans avoir à répéter le code commun.

### Définir et Utiliser des Blocs

#### Template de Base (layout)

Dans un template de base, vous définissez des blocs avec `{% block nomdublock %}{% endblock %}`. Ces blocs peuvent ensuite être remplacés dans les templates enfants.

##### Exemple d'un Template de Base

```twig
{# templates/base.html.twig #}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Mon Site{% endblock %}</title>
    {% block stylesheets %}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {% endblock %}
</head>
<body>
    <header>
        {% block header %}
            <h1>Bienvenue sur Mon Site</h1>
        {% endblock %}
    </header>

    <nav>
        {% block nav %}
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/about">À propos</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        {% endblock %}
    </nav>

    <main>
        {% block body %}
            <p>Contenu principal</p>
        {% endblock %}
    </main>

    <footer>
        {% block footer %}
            <p>&copy; 2024 Mon Site. Tous droits réservés.</p>
        {% endblock %}
    </footer>

    {% block javascripts %}
        <script src="{{ asset('js/app.js') }}"></script>
    {% endblock %}
</body>
</html>
```

#### Template Enfant (override de base.html.twig)

Un template enfant hérite du template de base et peut remplacer ou ajouter du contenu aux blocs définis dans le template de base.

{% extends 'base.html.twig' %}
// modifie le template e base 
{% block title %}Utilisateur{% endblock %}

##### Exemple d'un Template Enfant

```twig
{# templates/page.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Page d'accueil{% endblock %}

{% block header %}
    <h1>Page d'accueil personnalisée</h1>
{% endblock %}

{% block body %}
    <p>Bienvenue sur la page d'accueil !</p>
{% endblock %}
```

### Explication en Détail

1. **Définition d'un bloc** :
   - `{% block nomdublock %}{% endblock %}` : Définit un bloc nommé `nomdublock`. Vous pouvez mettre n'importe quel nom à la place de `nomdublock`. Le contenu de ce bloc peut être remplacé dans un template enfant.

2. **Héritage de template** :
   - `{% extends 'base.html.twig' %}` : Indique que ce template enfant hérite du template `base.html.twig`. Tout le contenu du template enfant sera intégré dans les blocs définis dans le template de base.

3. **Remplacement de blocs** :
   - `{% block title %}Page d'accueil{% endblock %}` : Remplace le contenu du bloc `title` défini dans le template de base avec le nouveau contenu.
   - `{% block header %}<h1>Page d'accueil personnalisée</h1>{% endblock %}` : Remplace le contenu du bloc `header` avec un nouveau contenu.

4. **Ajout de contenu à un bloc** :
   - Si vous voulez ajouter du contenu à un bloc existant plutôt que de le remplacer complètement, vous pouvez utiliser `{{ parent() }}` pour inclure le contenu original du bloc dans le template de base.

##### Exemple d'ajout de contenu

```twig
{% block footer %}
    {{ parent() }}
    <p>Informations supplémentaires dans le pied de page.</p>
{% endblock %}
```

### Avantages des Blocs et de l'Héritage

- **Réutilisabilité** : Vous pouvez définir une structure de base commune dans un template et réutiliser cette structure dans plusieurs templates enfants, ce qui réduit la duplication de code.
- **Modularité** : En utilisant des blocs, vous pouvez facilement modifier ou étendre des sections spécifiques d'un template sans affecter les autres sections.
- **Maintenance** : Les templates deviennent plus faciles à maintenir, car les changements dans la structure de base peuvent être effectués dans un seul fichier, et ces changements seront automatiquement appliqués à tous les templates enfants.

### Conclusion

Les blocs et l'héritage de templates dans Twig sont des outils puissants pour structurer et organiser vos templates. Ils permettent une grande flexibilité et facilitent la réutilisation et la maintenance du code des templates.

## Lien href
<a href="{{path('user_userCard', {'id':user.id}) }}">Voir le detail</a>