<?php
/*
Plugin Name: Book template
Description: Plugin per l'inserimento dei dati editoriali di un libro o di un fumetto con uno shortcode. Al momento solo in italiano.
Version: 0.4
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://github.com/ulaulaman/book-template
*/
/* ------------------------------------------------------ */
# ---------------------------------------------------------
# 0.3 creazione shortcode con testo di base
#add_shortcode('dati-editoriali', 'dati_editoriali');
#
# function dati_editoriali () {
#   $text = Ciao;
#   return $text;
#}
#
# 0.1.1 Sostituizione di "Ciao" con "Abbiamo parlato di" con formattazione
# 0.2 aggiunta attributi: titolo
# 0.2.1 aggiunta altri dati editoriali
# 0.2.2 nomi attributi: dall'italiano all'inglese
# 0.3 ottimizzazione codice shortcode
# 0.4 aggiunta box con messaggio per l'uso dello shortcode in cima al post
#
# Aggiunta metabox
add_action( 'load-post.php', 'bookdata_meta_box' );
add_action( 'load-post-new.php', 'bookdata_meta_box' );

# Definizione metabox
function bookdata_meta_box() {
  ?>
  <div class="update-nag notice">
      <p><?php _e( 'Esempio generico [bookdata title="Titolo" author="Autori" publisher="Editore" date="Data" pages ="numero pagine" type="Borssurato,Cartonato,Digitale/on-line" price="prezzo valuta/gratuito"]<br/>In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]<br/>Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]<br/>I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli', 'book_template_textdomain' ); ?></p>
  </div>
  <?php
}

# Creazione shortcode dati editoriali
add_shortcode('bookdata', 'bookdata');

 function bookdata ($atts, $content = null) {

   extract(
      shortcode_atts(
         array( 
		'title' => null, 
		'author' => null, 
		'translator' => null,
		'publisher' => null, 
		'date' => null, 
		'pages' => null, 
		'type' => null, 
		'col' => null, 
		'price' => null, 
		'isbn' => null, 
		'issn' => null, 
                'notes' => null,
	 ),
         $atts
      )
   );

   $book = '<p><strong>Abbiamo parlato di</strong>:<br/><em>'.$title.'</em><br/>'.$author;
   
   if ( $translator <> null )
   {$book = $book.'<br/>Traduzione di '.$translator;}
   else
   {$book = $book;}
   
   if ( $col <> null )
   {$book = $book.'<br/>'.$publisher.', '.$date.'<br/>'.$pages.' pagine, '.$col.' - '.$price;}
   else
   {$book = $book.'<br/>'.$publisher.', '.$date.'<br/>'.$pages.' pagine, '.$type.' - '.$price;}

   if ( $isbn <> null )
   {$book = $book.'<br/>ISBN: '.$isbn;}
   else
   {
   if ( $issn <> null )
   {$book = $book.'<br/>ISSN: '.$issn;}
   else
   {$book = $book;}
   }

   if ( $notes <> null )
   {$book = $book.'<br/>'.$notes;}
   else
   {$book = $book;}

   $text = $book;
   return $text;
}

/* ------------------------------------------------------ */
?>
