# book-template
Plugin per l'inserimento dei dati editoriali di un libro o di un fumetto con uno shortcode. Al momento solo in italiano.<br/>
Esempio generico [bookdata title="Titolo" author="Autori" publisher="Editore" date="Data" pages ="numero pagine" type="Borssurato,Cartonato,Digitale/on-line" price="prezzo valuta/gratuito"]<br/>
In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]<br/>
Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]<br/>
I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli

## changelog

0.3 creazione shortcode con testo di base<br/>
add_shortcode('dati-editoriali', 'dati_editoriali');<br/>
<br/>
function dati_editoriali () {<br/>
  $text = Ciao;<br/>
  return $text;<br/>
}<br/>
<br/>
0.1.1 Sostituizione di "Ciao" con "Abbiamo parlato di" con formattazione<br/>
0.2 aggiunta attributi: titolo<br/>
0.2.1 aggiunta altri dati editoriali<br/>
0.2.2 nomi attributi: dall'italiano all'inglese<br/>
0.3 ottimizzazione codice shortcode<br/>
0.4 aggiunta box con messaggio per l'uso dello shortcode in cima al post<br/>
0.5 spostamento del metabox di messaggio sulla colonna destra<br/>
0.5.1 corretto errore di battitura e negli if di controllo
