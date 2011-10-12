TrizeroBoilerplate è una semplice base per creare siti sfruttando [Propel](http://www.propelorm.org/) e [Twig](http://twig.sensiolabs.org/).

In questo file sono incluse le seguenti release

+ Versione 1.6 di Propel
+ Versione 1.2.0 di Twig


-----


##Installazione 

Una volta scaricata questa base sono necessari alcuni step per terminare la configurazione

1. Assicuratevi che la cartella assets/cache permetta la scrittura al Web Server
2. Spostate nella root il file XML utilizzato per creare il database e le classi per Propel
3. Modificate il file build.properties cambiando:
	--Il nome del progetto (riga 5)
	--I dati del database (righe 7-10)
4. Modificate il file buildtime-conf.xml cambiando:
	--Il nome del progetto (righe 4 e 5)
	--I dati del database (righe 6,9,10)
5. Modificate il file runtime-conf.xml nello stesso modo.
6. Generate sql e classi usando propel (propel-gen e propel-gen insert-sql)
7. Modificate nel file boostrap.php il percorso verso il file di configurazione (riga 5)

##Uso
I files PHP vanno nella root. Per utilizzare Propel e Twig basterà includere il file boostrap.php.
Per ulteriori informazioni vedere il file `index.php`


##Uso su WebServer
Cancellate (o non caricate online) la cartella `vendor/propel/generator`

#Extra
Se si vuole utilizzare Twig ma non propel commentare le righe 4,5 e 6 del file boostrap.php

##Contatti
Per ogni richiesta, bug, suggerimento su come migliorare questa base contattare

mauro@trizero.it

giorgio@trizero.it

O utilizzare la voce Issue di Github
