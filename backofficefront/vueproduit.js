let ref = window.location.search.split("=")[1]

fetch("./produits.json")
.then(rep=>{
    return rep.json()
}).then(data=>{
    data.forEach(elt => {
        if(elt.reference===ref){
            afficheLeProduit(elt)
        }
    });
})


function afficheLeProduit(p){
    let template =`<div class="flex justify-between align-center">
<div class="large-4">
    <img src="./imagesProduits/${p.photo}" class="responsive" alt="">
</div>
<div class="large-8">
    <div class="flex justify-between">
        <h2>${p.libelle}</h2>
        <div class="flex">
            <div class="stock ${p.stock>0 ? "stock-ok" :"stock-nok"}"></div>
            <p>${p.stock}</p>
        </div>
    </div>
    <div class="flex justify-between align-center mt-16">
        <div>
            <p><b>Référence :</b>${p.reference}</p>
            <div class="badge">${p.categorie}</div>

        </div>
        <div>
            <p class="prix">${p.prix}€</p>
        </div>
    </div>
    <p class="mt-16">${p.description}</p>

</div>
</div>`
document.querySelector("#container").innerHTML = template
}


