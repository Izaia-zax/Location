<h1>Formulaire de location</h1>

<?php if(!empty($validation)) {    ?>  
        <div style="color:red">
       <?php foreach ($validation as $v) {    ?>
                <p><?= $v ?></p>
      <?php  } ?>

</div>
<?php } ?>
<form method="post" action="/valider_location">
    <label for="vehicule">Vehicule :</label>
    <select id="vehicule" name="vehicule" required>
            <?php foreach($vehicule as $v) : ?>
                    <option value="<?= $v['id']?>"><?= $v['modele']?></option>
            <?php endforeach ?>
    </select>

    <br><br>

    <label for="clients">Clients :</label>
    <select id="clients" name="clients" required>
            <?php foreach($clients as $c) : ?>
                    <option value="<?= $c['id']?>"><?= $c['nom']?></option>
            <?php endforeach ?>
    </select>
    <br><br>

    <label for="date_debut">Date de debut : </label>
    <input type="date" id="date_debut" name="date_debut" required>
    <br><br>

    <label for="date_fin">Date fin : </label>
    <input type="date" id="date_fin" name="date_fin" required>
    <br><br>
    <button value="submit">Valider</button>
</form>

<h1>Liste des voitures disponible</h1>
<table>
        <tr>
                <th>Modele</th>        
                <th>Marque</th>        
                <th>Categorie</th> 
                <th>immatriculation</th>
                <th>Statut</th>        
        </tr>
       <?php if(!empty($vehicule_dispo)){ ?>
        <?php foreach($vehicule_dispo as $v){ ?>
                        <tr>
                                <td><?= $v['modele'] ?? ''?></td>
                                <td><?= $v['marque'] ?? ''?></td>
                                <td><?= $v['categorie'] ?? ''?></td>
                                <td><?= $v['immatriculation'] ?? ''?></td>
                                <td><?= $v['statut'] ?? ''?></td>
                        </tr>        
        <?php    } ?>
       <?php } else { ?>
                <tr><td>Aucune voiture disponible</td></tr>
       <?php } ?>
</table>


<h1>Liste des voitures en location</h1>
<table>
        <tr>
                <th>Modele</th>        
                <th>Marque</th>        
                <th>Categorie</th> 
                <th>immatriculation</th>
                <th>clients</th>        
                <th>date debut</th>        
                <th>date fin</th>        
        </tr>
       <?php if(!empty($location_encours)){ ?>
        <?php foreach($location_encours as $loc){ ?>
                        <tr>
                                <td><?= $loc['modele'] ?? ''?></td>
                                <td><?= $loc['marque'] ?? ''?></td>
                                <td><?= $loc['categorie'] ?? ''?></td>
                                <td><?= $loc['immatriculation'] ?? ''?></td>
                                <td><?= $loc['client'] ?? ''?></td>
                                <td><?= $loc['date_debut'] ?? ''?></td>
                                <td><?= $loc['date_fin'] ?? ''?></td>
                        </tr>        
        <?php    } ?>
       <?php } else { ?>
                <tr><td>Aucune voiture disponible</td></tr>
       <?php } ?>
</table>