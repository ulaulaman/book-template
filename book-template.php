<?php
/*
Plugin Name: Book template dev
Description: Plugin in italiano che aggiunge uno shortcode per la creazione di un box con i dati editoriali di un libro o di un fumetto.
Version: 2018.0213
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://ulaulaman.github.io/book-template/
License: GPLv2 or later
*/
/* ------------------------------------------------------ */
# Load translations
add_action('plugins_loaded', 'bt_load_translations');
function bt_load_translations() {
	load_plugin_textdomain( 'book-template', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

# Aggiunta metabox
add_action( 'load-post.php', 'bookdata_meta_box_setup' );
add_action( 'load-post-new.php', 'bookdata_meta_box_setup' );

# Setup metabox
function bookdata_meta_box_setup() {

# aggiunta del metabox
  add_action( 'add_meta_boxes', 'bookdata_meta_box' );
}

function bookdata_meta_box() {

  $intro = __( 'Inserimento dati editoriali', 'book-template' );

  add_meta_box(
    'bookdata-post-class',      // ID unico
    esc_html__( $intro, 'example' ),    // Titolo
    'bookdata_class_meta_box',   // funzione
    'post',         // associato a
    'side',         // contesto
    'high'         // priorità
  );
}

# mostra il metabox
function bookdata_class_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'bookdata_class_nonce' ); ?>

  <p>
    <label for="bookdata-post-class"><?php _e( 'Esempio generico [bookdata title="Titolo" author="Autori" publisher="Editore" date="Data" pages ="numero pagine" type="brossurato,cartonato,digitale/on-line" price="prezzo valuta/gratuito"]', 'book-template' ); ?><br/><?php _e(' In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]', 'book-template' ); ?><br/><?php _e( 'Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"] ed eventuali note aggiuntive [dati_editoriali ... notes="Note aggiuntive"]', 'book-template' ); ?><br/><?php _e( 'I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli.', 'book-template' ); ?></label></p>
<?php }

# creazione shortcode dati editoriali
add_shortcode( 'bookdata', 'bookdata' );

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

   $intro = __( 'Abbiamo parlato di', 'book-template' );

   $book = '<p><strong>'.$intro.'</strong>:<br/><em>'.$title.'</em><br/>'.$author;
   
   if ( $translator <> null )
   {$translator = __( 'Traduzione di ', 'book-template' ).$translator;
    $book = $book.'<br/>'.$translator;}
   else
   {$book = $book;}

   $pages = $pages.' '.__( 'pagine', 'book-template' );
   
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
