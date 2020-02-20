<div class="pull-right">  Dernière modification 22/06/2018 </div>
# Asterisk Ubuntu 16.04 server

### A savoir
Je compte utiliser ce fichier pour rédiger mon rapport, je le met à votre disposition pour vous aider à comprendre. Merci de ne pas faire du copier coller.  

### Présentation d'astérisk
Asterisk n’est pas comme son nom pourrait porter à confusion un gaulois, c’est un utilitaire sous linux qui permet de jouer le rôle de serveur téléphonique IP. C’est-à-dire que grâce à lui vous pouvez passer des appels depuis votre ordinateur, téléphone IP ou même portable connecté en wifi en passant par le réseau local. Cette solution permet dans un premier temps de mettre en place un système de téléphonie interne à votre réseau autant pour particulier que pour professionnel. Dans un second temps, lié à un service SIP (Session Initiation Protocol) qui est protocole de transfert de voix sur internet, permet de passer des appels directement sur votre réseau local vers des numéros fixe ou portable.

### Installation d'Asterisk
Nous allons utiliser une machine virtuelle sous avec Ubuntu 16.04 comme OS.

1. #### Mise à jour du système
  Il faut lancer unn terminal et saisir les commandes suivantes :  
  ```
  sudo -s
  apt-get update
  ```

1. #### Installation d'asterisk
  ```
  apt-get install asterisk
  ```

### Modification des fichiers de configuration  
Nous allons d'abord faire une copie des fichers nous rendre dans le fichier **/etc/asterisk** et faire une sauvegarde des fichiers **sip.conf** et **extensions.conf**.
```
cd /etc/asterisk
cp sip.conf sip.conf.bak
cp extension.conf extension.conf.bak
```

1. #### Création des comptes SIP  
  Nous allons d'abord vider le fichier **sip.conf** pour plus de clarté puis l'ouvrir.

  ```
  echo "" >sip.conf
  nano sip.conf
  ```

  Nous allons ensuite définir la langue par défaut qui sera le français.

  ```
  [general]
  language=fr
  videosupport=yes
  context=estm
  allowoverlap=yes
  ```

  Il faudra ensuite créer les utilisateurs.

  ```
  [kratos]  
  type=friend  
  host=dynamic  
  user=kratos  
  secret=passer  
  context=estm
  mailbox=601  

  [kaido]  
  type=friend  
  host=dynamic  
  user=kaido  
  secret=passer  
  context=estm  
  mailbox=602  

  [kuzan]  
  type=friend  
  host=dynamic  
  user=kuzan  
  secret=passer  
  context=estm  
  mailbox=603
  ```

  Voilà ci dessous le tableau de correspondance des champs pour la configuration de utilisateurs.  

  | Option | Fonction     |
  | :------------- | :------------- |
  | **type=friend** |Il permet d’appeler et d’être appelé.|
  | **host=dynamic** |C'est l’adresse IP du client est définie par DHCP. Si son IP était fixe, nous l’aurions précisée ici.|
  | **user=kratos** |C'est le nom de l’utilisateur.|
  | **secret=passer** |C'est le mot de passe en clair.|
  | **context=estm** |C'est le contexte auquel le compte est associé dans le dialplan (il sera utile pour le fichier extensions.conf), le dialplan étant une suite d’instructions numérotées (que nous verrons un peu plus loin), qui seront exécutées dans un ordre précis.|  

1. #### Dialplan ou plan de numérotation
  Nous allons modifier le fichier **/etc/asterisk/extensions.conf** pour définir les contextes et les plans de numérotation. Il va nous permettre de définir les actions à effectuer en cas d'appel.

  ```
  echo "" > extensions.conf
  nano extensions.conf
  ```

  ```
  [estm]  
  exten => 2001,1,DIAL(SIP/kratos,r)  
  exten => 2002,1,DIAL(SIP/kaido,r)  
  exten => 2003,1,DIAL(SIP/kuzan,r)  
  ```
  On définit un plan d’appel par :  
  **exten => Numéro,Priorité, Applications ()**

  | Option | Fonction |
  | :------------- | :------------- |
  | **Exten =>** | marque le début d’une extension |
  | **Numéro** | correspond au numéro de téléphone pris en compte par l’extension. |
  | **Priorité** | définit l’ordre des actions de l’extension |
  | **Application** | définit ce que le serveur va faire |

### Complément de dépendance
Il faut installer les packets audios
```
apt-get install asterisk-core-sounds-fr
```

### Installation des softphones
Pour pouvoir tester notre serveur nous aurons besoin de téléphones IP. Vu que nous ne disposons pas de telles ressources il faudra nous contenter de téléphones ip tels que **Zoiper**, **Xlite** et **PortSIP**.  

Nous allons dans un premier temps télécharger et installer sur notre machine phyique l'application [Xlite](https://www.counterpath.com/x-lite/) puis nous allons installer **Zoiper** à partir du Playstore de google.  

1. #### Xlite
Il faudra lancer **Xlite** après l'installation, cliquer sur le menu <kbd>Softphone</kbd> puis sur <kbd>Account settings</kbd>.  
Dans fenêtre qui s'ouvre il faudra renseigner au moins le **userID** (nom d'utilisateur), le **Domain**(adresse ip u serveur Asterisk) et le **Password**.



### Actualiser et tester   
Nous avons fait des changements dans les configurations des fichiers. Il nous faut à présent que le système prenne en compte ces modifications. Pour toute modification de sip.conf et de extensions.conf, il est nécessaire qu’Asterisk recharge ces fichiers. Pour cela, nous nous connectons sur la console d’Asterisk :

```
asterisk -rvd
```
v: pour verbose  
d: pour debug  

Puis nous rechargeons Asterisk
```
reload
```
Pour aficher la liste des utilisateurs faire
```
sip show user
```

### Transfert d'appel
Il est possible de transférer automatiquement un appel vers un autre numéro lorsque que l'appelé ne repond pas. Il suffit de

### Gestion de boite vocale
Pour configurer la boite nous allons éditer le fichier **voicemail.conf**.
```
cp voicemail.conf voicemail.conf.bak
echo "" > voicemail.conf
nano voicemail.conf
```

```
[general]
Format = wav49|gsm|wav ;format de l’enregistrement du message vocal
Attach = yes ;Paramètre pour l’envoie des message par mail
Maxsilence = yes
Silecethreshold = 128
Maxlogin=3

[estm]
601=>601,kratos
602=>602,kaido
603=>603,kuzan
```


  ------------------------


### Conférence téléphonique
### Langue
### visiophonie
### Personnalisation du son
### Transfert d'appel manuel et automatique
### Parking
### Interception d'appel
### Patron secrétaire
### IVR (interaction avec une boite vocale personnalisée)
### Interconnexion
### Enregistrement d'appel
### SMS (tresor/jessy)
### Routage intelligent (traore/esta)
### Centre d'appel (diarra/niang)
### CURL/system (ibou)
### Authentification (khady)
### Consultation de compte bancaire par téléphone

### Gestion des Musique
```
apt-get install asterisk-mp3
apt-get install mpg123
```
créer le répertoire
Ouvrir le fichier
```
nano +5000 musiconhold.conf
```

copier la partie
```
;[manual]
;mode=custom
; Note that with mode=custom, a directory is not req$
; from a stream.
;directory=/var/lib/asterisk/mohmp3
;application=/usr/bin/mpg123 -q -r 8000 -f 8192 -b 2$

```
on remplace manual par un nom d'utilisateur, et don doit préciser le directory

ajouter des codecs pour les utilisateurs dans le fichier sip.conf
```
allow=h261
allow=h263
allow=h264

```
aller dans le fichier extensions.conf
```
exten => 2005,1,Dial(SIP/kratos,50,rm(kratos))
```

## Patron secretaire
```
features.conf

```
transfert d'appels supervisés  

décommenter
```
blindxfer =>
atxfer => *2
```

### video conference
decommenter dans le fichier sip.conf
```
videosupport=yes  
```

# Enregistrement d'appel
fichier features.conf
```
automon => *1                  ; One Touch Record a.k.a. Touch Monitor -- Make sure to set the W and/$
```
extensions
```
exten => 2003,1,Dial(SIP/diarra,10,TrwW)
DYNAMIC_FEATURES => automon
```

Il faut passer l'appel et faire ```*1``` après avoir décroché.
les fichiers audio d'Enregistrement sont crées dans /var/spool/asterisk/Monitor



# Informations
### Fichiers de configurations
L'ensemble des fichiers de configuration se trouvent dans le dossier "/etc/asterisk".
* **users.conf** : afin de définir les utilisateurs et leurs configurations.
* **extensions.conf** : pour le paramétrage du Dialplan.
* **voicemail.conf** : pour la configuration de la Voice mail.


# Trunk et parking call
[supinoo](https://www.supinfo.com/articles/single/988-fonctionnalites-voip-avec-asterisk)

# voir
* [supinfo](https://www.supinfo.com/articles/single/3982-voip-avec-asterisk)
* [supinfo](https://www.supinfo.com/articles/single/1911-asterisk-serveur-voip-gratuit-partie-1)
* [supinfo](https://www.supinfo.com/articles/single/1909-asterisk-serveur-voip-gratuit-partie-2)
* [supinfo](https://www.voip-info.org/asterisk-config-sipconf/)
* [supinfo](https://www.supinfo.com/articles/single/531-installer-serveur-voip-asterisk-ses-clients)



# Sources
* [Supinfo 1](https://www.supinfo.com/articles/single/531-installer-serveur-voip-asterisk-ses-clients)
* [Supinfo 2](https://www.supinfo.com/articles/single/815-mise-place-serveur-asterisk)
