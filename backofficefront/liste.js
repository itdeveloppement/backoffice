// lire la donnée
let formSearch = document.getElementById("search-bar")
fetch("./produits.json")
.then(rep=>{ 
    console.log(rep)
    return rep.json()
})
.then(data=>{
    // data est accessible ici 
    console.log(data)
    construireListe(data)
    
    
    formSearch.addEventListener("submit",(e)=>{
        console.log("soumission")
        e.preventDefault()
        let liste =chercheLeMot(data)
        console.log(liste)
        construireListe(liste)
    })
})

function chercheLeMot(donnees){
    // ROle : chercher le mot tapé dans la barre de recherche
    // dans le tableau de données
    // paramètre: donnees le tableau de données 
    // retour  un tableau avec les produits filtrés
    let tab= []
    let mot = removeAccent(document.getElementById("search").value.toLowerCase())
    donnees.forEach(produit=>{
        if(removeAccent(produit.categorie.toLowerCase()).includes(mot) || removeAccent(produit.libelle.toLowerCase()).includes(mot) || removeAccent(produit.description.toLowerCase()).includes(mot)){
            // j'ai trouvé un produit qui contient le mot
            // je le stock dans un tableau temporaire
            tab.push(produit)
        }
    })

    return tab
}
function removeAccent(string){
    // supprime les accents et les remplace par leur équivalent sans accent
    // parametre string - chaine de caractère à modifier
    // retour: string modifié
    //Cette version utilise la méthode normalize("NFD") pour décomposer les caractères accentués en caractères de base et diacritiques, puis utilise une expression régulière /[\u0300-\u036f]/g pour supprimer tous les diacritiques, ce qui revient à enlever les accents de la chaîne de caractères.
    return string.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
}

function construireListe(donnees){
    //role : construit le template (les lignes de la table)
    // parametre: donnees le tableau de produits
    // retour : rien

    let template=""    
    donnees.forEach(d => {

        template+=`
        <tr>
            <td>${d.reference}</td>
            <td>${d.categorie}</td>
            <td>${d.libelle}</td>
            <td>${d.prix}€</td>
            <td>
                <div class="stock ${d.stock >0 ? "stock-ok" : "stock-nok"}"></div>
            </td>
            <td>
                <a href="vueProduit.html?ref=${d.reference}"><span class="picto picto-eye"></span></a>
                <a href=""><span class="picto picto-edit"></span></a>
                <a href=""><span class="picto picto-delete"></span></a>
            </td>
        </tr>
        `
    });

    document.querySelector('table tbody').innerHTML=template

}


