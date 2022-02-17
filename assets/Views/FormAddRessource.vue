<template>
    <form action="#" method="post">
        <div class="form-header">
            <img src="../images/retour.png">
            <h1>Ajouter une ressource</h1>
        </div>
        <div class="form-body">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <label for="nom" class="form-label">Nom de la ressource</label>
                    <input type="text"  class="form-control" name="nom" id="nom">
                </div>
                <div class="col mb-4">
                    <label for="categorie" class="form-label">Type de catégories</label>
                    <select name="categorie" id="categorie" class="form-select">
                        <option value="null">Sélectionnez une catégorie</option>
                    </select>
                </div>
                <div class="col mb-4">
                    <label for="type_ressource" class="form-label">Type de ressources</label>
                    <select name="type_ressource" id="type_ressource" class="form-select">
                        <option value="null">Sélectionnez un type de ressources</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="relation" class="form-label">Type de relations</label>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                        <div class="col mb-2">
                            <input type="checkbox" name="soi" id="soi">
                            <label for="soi">Soi</label>
                        </div>
                        <div class="col mb-2">
                            <input type="checkbox" name="conjoint" id="conjoint">
                            <label for="conjoint">Conjoints</label>
                        </div>
                        <div class="col mb-2">
                            <input type="checkbox" name="famille" id="famille">
                            <label for="famille">Famille</label>
                        </div>
                        <div class="col mb-2">
                            <input type="checkbox" name="professionnel" id="professionnel">
                            <label for="professionnel">Professionnelle</label>
                        </div>
                        <div class="col mb-2">
                            <input type="checkbox" name="amis" id="amis">
                            <label for="amis">Amis et communautés</label>
                        </div>
                        <div class="col mb-2">
                            <input type="checkbox" name="inconnu" id="inconnu">
                            <label for="inconnu">Inconnus</label>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="file" class="form-label">Ajouter une ressource</label>
                    <p class="text-secondary">Taille maximale : xx Mo. Formats supportés : xxx, xxx, xxx. Plusieurs fichiers possibles.</p>
                    <input type="file" class="form-control" name="file" id="file" multiple>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <input type="submit" value="Ajouter">
            <button>Annuler</button>
        </div>
    </form>
</template>

<script>
export default {
  name: "formAddRessource"
};
</script>

<style scoped>
    form{
        position: relative;
        height: auto;
        margin: 5vh 10% 5vh 10%;

        background: #FFFFFF;
        border: 1px solid #E5E5E5;
        box-sizing: border-box;
        border-radius: 4px;
    }

    .form-header{
        border-bottom: solid #E5E5E5 1px;

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    .form-header img{
        width: 32px;
        height: 32px;
        margin: 16px 4px 5px 16px;
    }

    .form-header h1{
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;
        margin: 16px 0 5px 0;
    }

    .form-body{
        padding: 16px;
    }

    .form-body input{
        border: none;
        background-color: #e5e5e5;
        border-bottom: solid 1px black;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .form-body [type="checkbox"] {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }

    .form-body [type="checkbox"] + label {
        align-items: center;
        position: absolute;
    }

    .form-body select{
        border: none;
        background-color: #e5e5e5;
        border-bottom: solid 1px black;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .form-body p{
        font-size: 14px;
    }

    .form-body [type="file"] {
        border: none;
        background: none;
    }

    .form-footer{
        border-top: solid #E5E5E5 1px;
        text-align: right;
        padding: 12px;
    }

    .form-footer input, .form-footer button{
        border: none;
        border-radius: none;
        width: 142px;
        height: 40px;
        margin: 8px;
    }

    .form-footer input{
        background-color: var(--bs-primary);
        color: white;
    }

    .form-footer input:hover{
        background-color: #0909b9;
    }

    .form-footer button{
        background-color: white;
        color: var(--bs-primary);
        border: solid var(--bs-primary) 1px;
    }

    .form-footer button:hover{
        background-color: #e5e5e5;
    }
</style>