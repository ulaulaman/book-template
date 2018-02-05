<?php
/*
Plugin Name: Book template
Description: Plugin in italiano che aggiunge uno shortcode per la creazione di un box con i dati editoriali di un libro o di un fumetto.
Version: 0.5.2
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://github.com/ulaulaman/book-template
GitHub Plugin URI: https://github.com/ulaulaman/book-template
License: GPLv2 or later
*/
/* ------------------------------------------------------ */
# Aggiunta metabox
add_action( 'load-post.php', 'bookdata_meta_box_setup' );
add_action( 'load-post-new.php', 'bookdata_meta_box_setup' );

/* Meta box setup function. */
function bookdata_meta_box_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'bookdata_meta_box' );
}

function bookdata_meta_box() {

  add_meta_box(
    'bookdata-post-class',      // Unique ID
    esc_html__( 'Inserimento dati editoriali', 'example' ),    // Title
    'bookdata_class_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'side',         // Context
    'high'         // Priority
  );
}

/* Display the post meta box. */
function bookdata_class_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'bookdata_class_nonce' ); ?>

  <p>
    <label for="bookdata-post-class">Esempio generico [bookdata title="Titolo" author="Autori" publisher="Editore" date="Data" pages ="numero pagine" type="brossurato,cartonato,digitale/on-line" price="prezzo valuta/gratuito"]<br/>In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]<br/>Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]<br/>I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli.</label></p>
<?php }

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
   {$book = $book.'<br/>'.$publisher.', '.$date.'<br/>'.$pages.' pagine, '.$type.', '.$col.' - '.$price;}
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
