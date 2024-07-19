**symfony**
## Créer un Controller
cmd : symfony console make:controller

## methode php-symphonie
    • dd() 
        ◦ rôle : affiche la variable
        ◦ param : un variable
    • asset
        ◦ "{{asset('css'/'style.css')}}"
        ◦ lien à partir de public pour le moteur twig
    
    • json()
        ◦ public function json($data, int $status = 200, array $headers = [], array $context = []): 
        ◦ role : renvoyer directement depuis le controleur une reponse json
        ◦ param : 
            $data : les données (tableau ou objet)
            $status : Le code de statut HTTP ,  200 pour OK, 404 pour Not Found, 500 pour Internal Server Error, etc.
            $headers :  Un tableau associatif de headers HTTP supplémentaires à inclure dans la réponse. Exemple : ['X-Custom-Header' => 'value']
        ◦ $context : Un tableau associatif de contexte pour le processus de sérialisation. Il peut être utilisé pour passer des options supplémentaires au sérialiseur. Exemple : ['json_encode_options' => JSON_PRETTY_PRINT]
    
    Exemple :

    #[Route('/api/colors', name: 'api_colors')]
    public function getColors(): JsonResponse
    {
        $colors = [
            'rouge' => '#FF0000',
            'vert' => '#00FF00',
            'bleu' => '#0000FF',
            'jaune' => '#FFFF00',
            'noir' => '#000000'
        ];

        return $this->json($colors);
    }

### Méthode HTTP

- **`$request->getMethod()`** : Retourne la méthode HTTP utilisée (GET, POST, PUT, DELETE, etc.).

### URL

- **`$request->getRequestUri()`** : Retourne l'URL complète de la requête.
- **`$request->getPathInfo()`** : Retourne la partie de l'URL après le nom de domaine.

### Paramètres

- **`$request->query->get('param')`** : Récupère un paramètre de la chaîne de requête (GET).
- **`$request->request->get('param')`** : Récupère un paramètre envoyé dans le corps de la requête (POST, PUT, etc.)..

### En-têtes HTTP

- **`$request->headers->get('header_name')`** : Récupère la valeur d'un en-tête HTTP.

### Contenu de la requête

- **`$request->getContent()`** : Retourne le contenu brut de la requête (utile pour les requêtes POST avec un corps).
  
### Autres méthodes utiles

- **`$request->isXmlHttpRequest()`** : Vérifie si la requête est une requête AJAX (XMLHttpRequest).
- **`$request->getSession()`** : Accède à la session de l'utilisateur.

### Test de la méthode HTTP

if ($request->isMethod('POST')) {
    // Traitement spécifique aux requêtes POST
} else {
    // Traitement spécifique aux autres méthodes
}

## Methode pour recuperer un parametre dans url

SOLUTION 1 (avec injonction de dependence)
    #[Route('/detail/user/{id}', name: 'user_userCard')]
    public function userCard(int $id): Response
    {
        ... mon code avec la possibilité d'utiliser la variable $id
    }

SOLUTION 2 (avec Request)
    #[Route('/detail/user', name: 'user_userCard')]
    public function userCard(Request $request): Response
    {
    $id = $request->query->get('id');
        ... mon code avec la possibilité d'utiliser la variable $id
    }