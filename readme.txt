=== Book template ===
Contributors: ulaulaman
Tags: book
Requires at least: 4.8.5
Tested up to: 5.5.1
Requires PHP: 7.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*Plugin* che aggiunge uno *shortcode* per la creazione di un *box* con i dati editoriali di un libro o di un fumetto.

== Description ==
Oltre allo *shortcode*, il *plugin* aggiunge un *metabox* di istruzioni ai *post*.

## Esempi

Esempio generico

[bookdata title="Titolo" author="Autore/i" publisher="Editore" date="Data" pages ="numero pagine" type="Borssurato,Cartonato,Digitale/on-line" price="prezzo/gratuito"]

In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]

Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"], l'età consigliata  [bookdata ... age="età consigliata"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]
Inoltre è possibile personalizzare il messaggio di apertura della scheda con il parametro *intro* e inserire un *link* relativo al libro con il parametro *url*.

I dati possono essere inseriti anche in maniera disordinata: ci penserà il *plugin* a riordinarli!

== Installation ==
1. Installa il [GitHub Updater](https://github.com/afragen/github-updater)
2. Vai nelle impostazioni del GitHub Updater, quindi nella scheda *Install Plugin*
3. Qui incolla il *permalink* del [*repository* su GitHub](https://github.com/ulaulaman/book-template)
4. Una volta installato, attiva
5. In alternativa scarica il [*file* .zip](https://github.com/ulaulaman/book-template/releases/download/2021.1016/book-template.2021.1016.zip) in allegato alla [release 2021.1016](https://github.com/ulaulaman/book-template/releases/tag/2021.1016), quindi scompattalo all'interno della cartella dei *plugin* della tua installazione wordpress

== Changelog ==
* 2021.1021 Corretto errore nell'*html* della scheda
* 2021.1016 Aggiunti due nuovi parametri: *intro*, per personalizzare la prima righa, e *url* per inserire in corrispondenza del titolo una possibile scheda dello stesso
* 2020.0813 Aggiunto allo *shortcode* il campo dell'età consigliata
* 2020.0718.1 Corretti errori codice
* 2020.0718 Aggiunti file delle lingue: italiano di *default*, inglese come traduzione
* 2018.0326 Corretto errore che raddoppia la parola "pagine" nella scheda dei dati editoriali
* 2018.0213.1 Aggiornamento estetico
  * Sostituito il trattino prima del prezzo. Sistemate alcunie parti nel *metabox* delle istruzioni
* 2018.0213 modificato il codice per permettere le traduzioni in preparazione dello spostamento in [Citations tools](https://wordpress.org/plugins/citations-tools/)
* 0.5.2 integrazione per l'aggiornamento tramite il [GitHub Updater](https://github.com/afragen/github-updater)
* 0.5.1 corretto errore di battitura e negli *if* di controllo
* 0.5 spostamento del *metabox* di messaggio sulla colonna destra
* 0.4 aggiunta *box* con messaggio per l'uso dello *shortcode* in cima al *post*
* 0.3 ottimizzazione codice *shortcode*
* 0.2.2 nomi attributi: dall'italiano all'inglese
* 0.2.1 aggiunta altri dati editoriali
* 0.2 aggiunta attributi: titolo
* 0.1 creazione *shortcode* con testo di base