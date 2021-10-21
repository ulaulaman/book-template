<?php
/*
Plugin Name: Book Template
Description: Plugin che aggiunge uno shortcode per la creazione di un box con i dati editoriali di un libro o di un fumetto.
Version: 2021.1021
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://ulaulaman.github.io/#BookTemplate
GitHub Plugin URI: https://github.com/ulaulaman/book-template
License: GPLv2 or later
*/

# Caricamento traduzioni
add_action('plugins_loaded', 'bt_load_translations');
function bt_load_translations() {
	load_plugin_textdomain( 'book-template', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

# Caricamento metabox
add_action( 'load-post.php', 'bookdata_meta_box_setup' );
add_action( 'load-post-new.php', 'bookdata_meta_box_setup' );

# Setup metabox
function bookdata_meta_box_setup() {

# Aggiunta del metabox
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

# Mostra il metabox
function bookdata_class_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'bookdata_class_nonce' ); ?>

  <p>
    <label for="bookdata-post-class"><?php _e( 'Esempio generico [bookdata title="Titolo" author="Autore/i" publisher="Editore" date="Data" pages="numero pagine" type="brossurato,cartonato,digitale/on-line" price="prezzo/gratuito"]', 'book-template' ); ?><br/><?php _e(' In caso di fumetto o libro illustrato, inserire il colore [bookdata ... col="colore,b/n"]', 'book-template' ); ?><br/><?php _e( 'Possono essere inseriti opzionalmente ISBN [bookdata ... isbn="codice"] o ISSN [bookdata ... issn="codice"], il traduttore [bookdata ... translator="Traduttore"], l\'età consigliata  [bookdata ... age="età consigliata"] ed eventuali note aggiuntive [bookdata ... notes="Note aggiuntive"]', 'book-template' ); ?><br/><?php _e( 'I dati possono essere inseriti anche in maniera disordinata: ci penserà il plugin a riordinarli.', 'book-template' ); ?></label></p>
<?php }

# Creazione shortcode dati editoriali
add_shortcode( 'bookdata', 'bookdata' );

 function bookdata ( $atts, $content = null ) {

  extract(
    shortcode_atts(
      array(
        'intro' => null,
        'title' => null,
        'url' => null,
        'author' => null,
        'translator' => null,
        'publisher' => null,
        'date' => null,
        'pages' => null,
        'type' => null,
        'col' => null,
        'price' => null,
        'age' => null,
        'isbn' => null,
        'issn' => null,
        'notes' => null,
      ),
      $atts
    )
  );

  $book='<p>';

  if ( $intro <> null ) {
    $book = $book.'<strong>'.$intro.'</strong>';
  } else {
    $book = $book.'<strong>'.__( 'Abbiamo parlato di:', 'book-template' ).'</strong>';
  }

  if ( $url <> null ) {
    $book = $book.'<br/><a href="'.$url.'" target="book"><wm>'.$title.'</em></a><br/>'.$author;
  } else {
    $book = $book.'<br/><em>'.$title.'</em><br/>'.$author;
  }

  if ( $translator <> null ) {
    $book = $book.'<br/>'.__( 'Traduzione di ', 'book-template' ).$translator;
  }

  $pages = $pages.' '.__( 'pagine', 'book-template' );

  if ( $col <> null ) {
    $book = $book.'<br/>'.$publisher.', '.$date.'<br/>'.$pages.', '.$type.', '.$col.' – '.$price;
  } else {
    $book = $book.'<br/>'.$publisher.', '.$date.'<br/>'.$pages.', '.$type.' – '.$price;
  }

  if ( $age <> null ) {
    $book = $book.'<br/>'.__( 'Lettura consigliata ', 'book-template' ).$age;
  }

  if ( $isbn <> null ) {
    $book = $book.'<br/>ISBN: '.$isbn;
  } else {
    if ( $issn <> null ) {
      $book = $book.'<br/>ISSN: '.$issn;
    }
  }
  
  if ( $notes <> null ) {
    $book = $book.'<br/>'.$notes;
  }

  $book = $book.'</p>';
  
  return $book;
}

?>
