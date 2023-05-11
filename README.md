# repertoireVF
site qui répertorie les voix françaises (principalement), créé avec symfony

## Spécificitées
Site qui répertorie les comédiens avec les rôles qu'il/elle a pu faire dans le doublage.
#### 
Un comédien pourra se créer un compte(nom, prénom, est-il directeur artistique ?).
Il pourra répertorier les rôles qu'il a pu faire (par défaut, les rôles seront enregistrées pour la version française).
ainsi que le moyen de le contacter (mail, tel) s'il le souhaite.
Il pourra aussi décider si les moyens de le contacter sont publiques, protégés ou privés.
##### 
publique: tout le monde peut le voir, même les visiteurs anonymes
#####
protégé: seul l'administrateur, le propriétaire, les comédiens et directeurs artistiques y ont accès
#####
privé: seul l'administarteur, le propriétaire et les directeurs artistiques ont y accès
### 
S'il est directeur artistique, il pourra également répertorier les oeuvres qu'il a dirigées.
Un directeur artistique peut participer au doublage d'une oeuvre, en plus de la direction.
Une oeuvre peut être dirigée par plusieurs directeurs artistiques si elle requiert beacoup de comédiens(rare)
#### 
Il y aura également les oeuvres(nom, date de parution) qui ont pu être doublées (en français pour commencer)
Ces oeuvres seront catégorisées selon leur type (film, série, animation, jeu vidéo, livre audio, voix-off, ...)
Certaines oeuvres n'ont pas de directeurs artistiques du fait qu'elles nécessitent très peu de comédiens.
Une oeuvre ne peut pas appartenir à plusieurs catégories.
Un comédien peut doubler plusieurs personnages au sein d'une même oeuvre (assez rare)
#### 
L'administrateur pourra ajouter/éditer/supprimer toutes les entitées du sites (particulièrement utiles pour les comédiens non français,
à utiliser avec précaution)
##Optionnel/Extension
-Pour chaque oeuvre, possibilité d'afficher au choix les comédiens de la version originale, où ceux de la version française
-Possibilité pour les directeurs artistiques d'enregistrer des oeuvres avant leur date de parution.
Dans ce cas, la date de parution sera obligatoire. De plus, tant que cette date ne sera pas passée, l'oeuvre pré-enregistrée ne sera visible que par celui qui l'a publiée.
