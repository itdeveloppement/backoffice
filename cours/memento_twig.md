resource : https://twig.symfony.com/


## commentaire
{# condition twig#}

## concatenation avec ~
 <p>{{user.adresse.code_postal ~ user.adresse.ville}}</p>

## formatage date
  <p>{{user.date_naissance |date('d-m-y')}}</p>
  resource : https://twig.symfony.com/doc/3.x/filters/date.html

## condition et boucle 
{# condition twig#}
{% if droit == true %}
  {# boucle for pour twig#}
        {% for book in books %}
            <div>
                <h2>{{book.titre}}</h2>
                <p>{{book.auteur}}</p>
            </div>
        {% endfor %}
    {% else %}
    <p>Vous n'avez pas les droits</p>
{% endif %}