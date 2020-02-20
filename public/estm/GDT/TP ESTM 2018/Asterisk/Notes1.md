<div class="pull-right"></div>
# Instllation et test des fonctions de base d'asterisk

1. Création des comptes SIP
1. Creation des contextes et des actions à exécuter
1. Gestion des boites vocales, langue en français
1. Parking
1. Gestion de la visiophonie
1. Personnalisation de la sonnerie
1. Fonction Patron secretaire
1. Interconnexion des serveurs TOIP

-------------------------------------------------------
Lancer asterisk
```
asterisk -rvvvvvvvvvvv
```
Afficher les commandes  
```
core show
```
Afficher le manuel d'une apllication
```
core show application [nom de l'application]
```
Pour voir si un packet a été installé
```
sudo apt-cache policy asterisk-voicemail
```
installer le packet suivant puis changer la langue
```
asterisk-prompt-fr-proformatique
```
puis aller dans sip.conf puis changer language=fr  
dans sip.conf mettre videosupport=yes
Il faut ajouter des codecs vidéos aux utilisateurs dans le fichier sip.conf

[diene]
allow = h263


Il faudra ensuite créer des classes de musique
```
musiconhold.conf
```
```
apt-get install mpg123
```

comment intercepter les appels *8
Interconnexion sip
seveur vocal interactif
