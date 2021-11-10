<?php

namespace WPEvents\PostTypes;
use WPEvents;

/**
 * Class Eventos.
 * Eventos CPT.
 *
 * @since 1.0.0
 */
class Eventos {

	/**
	 * Initialize Eventos.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_post_type' ) );
		//add_action( 'template_redirect', array( $this, 'archive_to_custom_archive' ) );
		add_filter( 'template_include', array( $this, 'set_templates' ) , 99, 1 );
		add_action( 'add_meta_boxes', array( $this, 'add_metaboxes' ) , 99, 1 );
		//\add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action ( 'save_post_evento', array( $this, 'save_post_evento' ) );

	}

	/**
	 * Create Eventos CPT.
	 *
	 * @since 1.0.0
	 */
	public function create_post_type() {

		$labels = array(
			'name'               => 'Eventos',
			'singular_name'      => 'Evento',
			'add_new'            => 'Adicionar novo',
			'add_new_item'       => 'Adidcionar novo evento',
			'edit_item'          => 'Editar evento',
			'new_item'           => 'Nova evento',
			'all_items'          => 'Todos os eventos',
			'view_item'          => 'Ver Eventos',
			'search_items'       => 'Procurar evento',
			'not_found'          => 'Nenhum evento encontrado',
			'not_found_in_trash' => 'Nenhum evento encontrado no lixo',
			'menu_name'          => 'Eventos'
		);

		register_post_type(
			'evento',
			array(
				'labels'           => $labels,
				'public'           => true,
				'public_queryable' => true,
				'has_archive'      => true,
				'rewrite'          => array( 'slug' => 'evento' ),
				'show_in_menu'     => true,
				'show_in_rest'     => false,
				'menu_icon'        => 'dashicons-calendar-alt',
				'supports'         => array( 'title', 'editor', 'thumbnail' ),
			)
		);
	}


	public function admin_enqueue_scripts( $page ) {

		if ( get_post_type() === 'evento' ) {

			wp_enqueue_style( 'evento_admin_css', WPEvents\PLUGIN_URL . '/assets/css/admin.css', array(), WPEvents\PLUGIN_VER );
			wp_enqueue_script( 'evento_admin_js', WPEvents\PLUGIN_URL . '/assets/js/admin_evento.js', array( 'jquery' ), WPEvents\PLUGIN_VER, true );
		}

	}

	public function set_templates( $template ) {
		if ( is_singular( 'evento' ) ) {
			return WPEvents\PLUGIN_DIR . '/templates/single-evento.php';
		} elseif ( is_home() || is_category() || is_search() ) {
			return WPEvents\PLUGIN_DIR . '/templates/archive-evento.php';
		}
	}

	function add_metaboxes() {

		add_meta_box(
			'infogeral',
			__( 'Informações Gerais', 'epa_theme' ),
			array( $this, 'metaboxes_content' ),
			'evento'
		);

		add_meta_box(
			'ingressos',
			__( 'Ingressos', 'epa_theme' ),
			array( $this, 'metaboxes_content' ),
			'evento'
		);

		add_meta_box(
			'descontos',
			__( 'Descontos Automáticos por Quantidade de Ingresso', 'epa_theme' ),
			array( $this, 'metaboxes_content' ),
			'evento'
		);
	}


	function metaboxes_content( $post, $metabox_data ) {

		$event_data = get_post_meta( $post->ID, 'event_data', true );
		require WPEvents\PLUGIN_DIR . '/templates/metaboxes/' . $metabox_data['id'] . '.php';

	}


	function save_post_evento( $post_id ) {

		$event_data = array();

		foreach ( $_POST as $key => $value ) {

			if ( strpos( $key, 'evento_data_' ) !== false ) {

				$key = str_replace( 'evento_data_', '', $key );

				if ( is_array( $value ) ) {
					unset( $value[0] );

					$key = explode( '_', $key );
					foreach ( $value as $index => $data ) {
						$event_data[ $key[0] ][ $index ][ $key[1] ] = $data;
					}
					update_post_meta( $post_id, $key[0], $event_data[ $key[0] ] );
				} else {
					$event_data[ $key ] = $value;
					update_post_meta( $post_id, $key, $value );
				}
			}
		}

		// Removes tickets without name.
		if ( ! empty( $event_data['ingressos'] ) ) {
			foreach ( $event_data['ingressos'] as $key => $value ) {
				if ( empty( $value['titulo'] ) ) {
					unset( $event_data['ingressos'][$key] );
				}
			}
		}

		update_post_meta( $post_id, 'event_data', $event_data );

	}


}
