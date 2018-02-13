=== Book template ===
Contributors: ulaulaman
Tags: book
Requires at least: 4.8.5
Tested up to: 4.9.4
Requires PHP: 7.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin in italiano che aggiunge uno shortcode per la creazione di un box con i dati editoriali di un libro o di un fumetto.

== Description ==
Oltre allo shortcode, il plugin aggiunge un metabox di istruzioni ai post.

## Esempi

Esempio generico [bookdata title="Titolo" author="Autori" publisher="Editore" date="Data" pages ="numero pagine" type="Borssurato,Cartonato,Digitale/on-line" price="prezzo valuta/gratuito"]
In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]
Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]
I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli!

== Screenshots ==
1. Metabox con le istruzioni per l'uso dello shortcode

== Installation ==
1. Installa il [GitHub Updater](https://github.com/afragen/github-updater)
2. Vai nelle impostazioni del GitHub Updater, quindi nella scheda *Install Plugin*
3. Qui incolla il *permalink* del [*repository* su GitHub](https://github.com/ulaulaman/book-template)
4. Una volta installato, attiva
5. In alternativa scarica il *file* .zip in allegato alla release 2018.0213, quindi scompattalo all'interno della cartella dei plugin della tua installazione wordpress

== Changelog ==
* 2018.0213 modificato il codice per permettere le traduzioni in preparazione dello spostamento in [Citations tools](https://wordpress.org/plugins/citations-tools/)
* 0.5.2 integrazione per l'aggiornamento tramite il [GitHub Updater](https://github.com/afragen/github-updater)
* 0.5.1 corretto errore di battitura e negli if di controllo
* 0.5 spostamento del metabox di messaggio sulla colonna destra
* 0.4 aggiunta box con messaggio per l'uso dello shortcode in cima al post
* 0.3 ottimizzazione codice shortcode
* 0.2.2 nomi attributi: dall'italiano all'inglese
* 0.2.1 aggiunta altri dati editoriali
* 0.2 aggiunta attributi: titolo
* 0.1 creazione shortcode con testo di base

