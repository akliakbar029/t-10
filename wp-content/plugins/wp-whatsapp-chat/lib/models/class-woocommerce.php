<?php
namespace QuadLayers\QLWAPP\Models;

use QuadLayers\QLWAPP\Entities\WooCommerce as WooCommerce_Entity;

use QuadLayers\WP_Orm\Builder\SingleRepositoryBuilder;

class WooCommerce {

	protected static $instance;
	protected $repository;

	public function __construct() {
		add_filter( 'sanitize_option_qlwapp_woocommerce', 'wp_unslash' );
		$builder = ( new SingleRepositoryBuilder() )
		->setTable( 'qlwapp_woocommerce' )
		->setEntity( WooCommerce_Entity::class );

		$this->repository = $builder->getRepository();
	}

	public function get_table() {
		return $this->repository->getTable();
	}

	public function get() {
		$entity = $this->repository->find();

		if ( $entity ) {
			return $entity->getProperties();
		} else {
			$admin = new WooCommerce_Entity();
			return $admin->getProperties();
		}
	}

	public function delete_all() {
		return $this->repository->delete();
	}

	public function save( $data ) {
		$entity = $this->repository->create( $data );

		if ( $entity ) {
			return true;
		}
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
