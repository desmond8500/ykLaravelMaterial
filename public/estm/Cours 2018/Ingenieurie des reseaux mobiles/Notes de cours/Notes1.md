<div class="pull-right">08-06-2018</div>

# Plan du cours
### Chapitre 1: Réseaux mobiles et évolutions
### Chapitre 2: Introduction à l'ingénieurie réseaux
### Chapitre 3: Ingénieurie de dimensionnement réseaux
### Chapitre 4: Ingénieurie de planification réseaux
### Chapitre 5: Ingénieurie d'optimisation réseaux


## Outils
SIG -> MapInfo -> GE
outils de moyen Atoll

----------------------

<div class="pull-right">20-06-2018</div>

>mat poteau qui est sur un batiment
>pilone poteau qui est au sol

### Architecture générale d'un RRM
<img src="../Cours 2018/Ingenieurie des reseaux mobiles/Notes de cours/photo1.jpg" alt="">

### Public land mobile network PLMN
<img src="../Cours 2018/Ingenieurie des reseaux mobiles/Notes de cours/photo3.jpg" alt="">

**Un site est composé de :**
- Pylone ou mat
- Antenne radio (directive, omnidirectionelle)
- Connecteurs
- Jumpers
- Cable coaxial ou feeders
- BTS indoor/outdoor
- Equipements radio (TRX;CU)
- Equipement de transmission (Modem, ODU, IDU)
- Equipement d'énergie (E secteur, E solaire, batterie, Groupe electrogène, redresseur)
- Equipement de protection
- Equipements de climatisation


**BCS**
- contrôler er gérer le BTS
- Allouer les canaux
- Décision et exécution des handovers
- traiter les signaux provenant du BTS  
Ce sont là les éléments intelligents du BSS

TRAU = Tanscodeur

**MSC**  
C'est le commutateur mobile.   
- Piloter les BSC
- Etablissment des commutateurs
- transmission des donnéees SMS
- Décision et execution des handovers
- Fonctions de passerelle
- Production de CRA pour la facturation  

Il s'agit du coeur de réseau.

**Base de donnée HLR**  

Base de donnée:
- HLR
- VLR assocée au MSC
- AUC associée HLR -> Triplet (RAND, Kc, SRES)
- EIR => IMEI
  * liste blanche = numéros autorisés
  * liste grise =  numéro bloqué temporairement le temps qu'il soit activé
  * liste noire =  numéros volés

### Les Identités
- IMSI
- MSISDN
- TMSI
- MSRN
- IMEI
- Cell ID
- LAC ou LAI

### les procédures de communication
1. La sélection de cellule (frequence BCCH BISC)
1. Reselection de cellule (passage d'une cellule à une autre de même LAC)
1. Misa à jour de localisation (passage d'une cellule à une autre de LACs différends)
1. Handover -> MS actif
1. Authentifications
<img src="../Cours 2018/Ingenieurie des reseaux mobiles/Notes de cours/photo8.jpeg" alt="">
1. le chiffrement()


----------------------

<div class="pull-right">21-06-2018</div>

# Evolution du GSM : GPRS  
### Pourquoi le système 2.5G: GPRS ?
### Limites et faiblesses du GSM
- débit faible et limité à 9.6 kps
- Réseaux à C crcuit -> service en temps réel
- Failles de tranmiison de données SMS -> 140 octets
- 1 slot par usager
- Facturation est f(durée d'occupation)

??? Comment faire pour faire évoluer le GSM pour pouvoir intégrer des services de données à débit variable et élévé et pour une taille des données plus importantes ->MMS    
-> Modulation GMSK qui est une modulation de fréquence filtrée où 1 symbole = 1 bit

### Augumenter le débit dans un réseau
1. Modulation
2. Codage canal
3. Multiplexage

### Solutions
1. Codage canal ----> 14,4 kbps
1. HSCSD -> 57 kbps
1. GPRS general radio packet service     
    -> 171,2 kbps   
    ->Principes et caractéristiques    
      * Solutions pour résoudre les faiblesses du GSM
      * 2.5 G (2G+0.5G)=2.5G
      * même principe que le GSM
      * Même couche physique que le GSM
      * Modulation GMSK où 1 symbole = 2 bits => 2²=4 Schémas
        codage(coding schéma: CS ) cs1 = 9;05 kbps  
                                    cs2 = 13,5 kbps  
                                    cs3 = 15,6 kbps  
                                    cs4 = 21,4 kbps  
      * Service de données MMS 100kos
      * 1 ou plusieurs Slots par user => 8$21,4=171,2

      > 1 user ) 8 slos tout code cs4
      pour avoir le debit max
      Dmax = 8*21,4kbps = 171,2 kbps  

    ->impact technique  
                        /->A: actif en GPRS et GSM simultanément  
    MS -> MS de classe --->B: veille en GPRS et GSM simultanément   
                        \->C: Activer le GPRS et GSM manuelllement   

          3 états possibles - veille ou idle mode  
                            - ready  
                            - standby   
    BSS ->  BTS+CCU (HW)    
        -> BSC + PCU (HW)    

                            /->  SGSN(HW)  
    NSS -> GSS ->Routeurs IP ->GGSN (HW)  
              \->framerelay  

    Nouveaux protocoles -> GTP et SNDCP


### Nouvelles interfaces
Gb: entre BSC/PCU & SG8N   
Gn: entre SGSN & GG8N  
Gi: entre GGSN & RTD   


# Technologies EDGE: 2,75G (Enhanced Datarate fo GSM Evolution)
## Pourquoi la technologie EDGE?
### lImites et faiblaisses du gsm / GPRS
* débit faible et limité à 171,2 kbps
* Priorité à la transmission signal parole (voix)
* préemption de slot (le slot peut être recupéré sans préavis)
* Dégradation

>77644xxxx = vip

> voix  - debit constant  
        - mode conncté  
        - service temps réel  
        - trafic en erlang -> en fonction du temps cd'occupation  

>data   - débit variable  
        - mode non connecté  
        - service non temps réel  
        - trafic en octetsbits -> en foncin du volume d'informations échangés    

???? Comment améliorer les performances du GPRS afin de garantir la QOS??

### Solutions
#### Techniques
1. Nouvelle modulation à définir:
8PSSK (Phase Shit Keying) qui est une modulation de phase à 8 états où 1 symbole = 3 bits =>  3² = 9 MCS: MCS1(8.8kbps) ...... MCS9(59.2kbps)                      
Débitmax = 8*59.2kbps = 473,6 kbps = 474 Kbps  
2. Rendre plus performant la couche RIC/ MAC
  1. Adaptation dynamique de lien (ADL)
  1. Redondance incrémentale (RI)
    - FEC (foward error correcttion)
    - ARQ ()
### impact technique
