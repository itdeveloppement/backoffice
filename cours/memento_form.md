
Exemple pour un formulaire User

## dossier FormType
Creer un dossier formType à la racine du dossier src

## Fichier UserType
Dans dossier FormTye créer un fichier UserType (choisir le nom en fonction de l'utilité du formulaire)
Intégrer la structure du formulaire avec les fonctions natives : 
- buildForm
- configureOptions

## Fichier form_user.html.twig 
Dans templates / user créer le fichier form_user.html.twig
Integrer

{% extends 'base.html.twig'%}

{% block body %}
    {{form_start(form)}}
    {{form_widget(form)}}
    {{form_end(form)}}
{% endblock %} 

## Controleur
Dans la route du formulaire il faut créer le formulaire : createForm

#[Route('/form', name: 'user_form', methods:['GET','POST'])]
    public function form(): Response
    {

        $form = $this->createForm(UserType::class);
        return $this->render('user/form_user.html.twig',
        [
            'form' => $form,
        ]);
    }
## Detail Fichier UserType
