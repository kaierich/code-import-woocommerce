

function wpdocs_register_my_custom_menu_page(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'Nhanh.vn',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        '',
        6
    ); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
 
/**
 * Display a custom menu page
 */

add_action('wp_ajax_add_terms', 'add_terms_init'); 
add_action('wp_ajax_nopriv_add_terms', 'add_terms_init');

function my_custom_menu_page(){ ?>
    <div class="container">
        <button class="submit">CLICK</button>
    </div> 

    <script>
        jQuery(document).ready(function(){
            jQuery('.submit').click(function(){
                jQuery.ajax({
                    type: 'POST',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: 'add_terms',
                    },               
                    success: function(data){
                        console.log(data);
                        //console.log(data);
                    },
                    error: function(errorThrown){
                        console.log(errorThrown);
                    }
                });
            });
        });
    </script>

    <?php
}


function add_terms_init(){

// 	$post = array(
// 		'post_content' => 'test',
// 		'post_status' => "publish",
// 		'post_title' => 'test',
// 		'post_parent' => '',
// 		'post_type' => "product",
// 	);
	
// 	//Create post
// 	$post_id = wp_insert_post( $post, $wp_error );
// 	############################

// 	//add product image:
// 	//require_once 'inc/add_pic.php';
// 	// require_once(ABSPATH . 'wp-admin/includes/file.php');
// 	// require_once(ABSPATH . 'wp-admin/includes/media.php');
// 	// $thumb_url = "https://cdn.nhanh.vn/cdn/store/28404/ps/20180523/img_9525_thumb_400x600_jpg_400x600.jpeg";

// 	// // Download file to temp location
// 	// $tmp = download_url( $thumb_url );

// 	// // Set variables for storage
// 	// // fix file name for query strings
// 	// preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $thumb_url, $matches);
// 	// $file_array['name'] = basename($matches[0]);
// 	// $file_array['tmp_name'] = $tmp;

// 	// // If error storing temporarily, unlink
// 	// if ( is_wp_error( $tmp ) ) {
// 	// @unlink($file_array['tmp_name']);
// 	// $file_array['tmp_name'] = '';
// 	// $logtxt .= "Error: download_url error - $tmp\n";
// 	// }else{
// 	// $logtxt .= "download_url: $tmp\n";
// 	// }

// 	// //use media_handle_sideload to upload img:
// 	// $thumbid = media_handle_sideload( $file_array, $post_id, 'gallery desc' );
// 	// // If error storing permanently, unlink
// 	// if ( is_wp_error($thumbid) ) {
// 	// @unlink($file_array['tmp_name']);
// 	// //return $thumbid;
// 	// $logtxt .= "Error: media_handle_sideload error - $thumbid\n";
// 	// }else{
// 	// $logtxt .= "ThumbID: $thumbid\n";
// 	// }

// 	// set_post_thumbnail($post_id, $thumbid);
		
// 	wp_set_object_terms( $post_id, 'Mật ong chín', 'product_cat' );
// 	wp_set_object_terms($post_id, 'variable', 'product_type');
	
// 	update_post_meta( $post_id, '_visibility', 'visible' );
// 	update_post_meta( $post_id, '_stock_status', 'instock');
// 	update_post_meta( $post_id, 'total_sales', '0');
// 	update_post_meta( $post_id, '_downloadable', 'yes');
// 	update_post_meta( $post_id, '_virtual', 'yes');
// 	update_post_meta( $post_id, '_regular_price', "1" );
// 	update_post_meta( $post_id, '_sale_price', "1" );
// 	update_post_meta( $post_id, '_purchase_note', "" );
// 	update_post_meta( $post_id, '_featured', "no" );
// 	update_post_meta( $post_id, '_weight', "" );
// 	update_post_meta( $post_id, '_length', "" );
// 	update_post_meta( $post_id, '_width', "" );
// 	update_post_meta( $post_id, '_height', "" );
// 	update_post_meta( $post_id, '_sku', "");
// 	$avail_attributes = array(
// 		'2xl',
// 		'xl',
// 		'lg',
// 		'md',
// 		'sm'
// 	);
// 	wp_set_object_terms( $post_id, $avail_attributes, 'pa_size');
// 	$thedata = Array('pa_size'=>Array(
//         'name'=>'pa_size',
//         'value'=>'',
//         'is_visible' => '1', 
//         'is_variation' => '1',
//         'is_taxonomy' => '1'
//     ));
	
// 	update_post_meta( $post_id, '_product_attributes', $thedata );

// //###################### Add Variation post types for sizes #############################
// //insert 5 variations post_types for 2xl, xl, lg, md, sm:
// 	$i=1;
//     while ($i<=5) {//while creates 5 posts(1 for ea. size variation 2xl, xl etc):
//     $my_post = array(
//     'post_title'=> 'Variation #' . $i . ' of 5 for prdct#'. $post_id,
//     'post_name' => 'product-' . $post_id . '-variation-' . $i,
//     'post_status' => 'publish',
//     'post_parent' => $post_id,//post is a child post of product post
//     'post_type' => 'product_variation',//set post type to product_variation
//     'guid'=>home_url() . '/?product_variation=product-' . $post_id . '-variation-' . $i
//     );

//     //Insert ea. post/variation into database:
//     $attID = wp_insert_post( $my_post );
//     $logtxt .= "Attribute inserted with ID: $attID\n";
//     //set IDs for product_variation posts:
//     $variation_id = $post_id + 1;
//     $variation_two = $variation_id + 1;
//     $variation_three = $variation_two + 1;
//     $variation_four = $variation_three + 1;
//     $variation_five = $variation_four + 1;

//     //Create 2xl variation for ea product_variation:
//     update_post_meta($variation_id, 'attribute_pa_size', '2xl');
//     update_post_meta($variation_id, '_price', 21.99);
//     update_post_meta($variation_id, '_regular_price', '21.99');
//     //add size attributes to this variation:
//     wp_set_object_terms($variation_id, $avail_attributes, 'pa_size');
//     $thedata = Array('pa_size'=>Array(
//     'name'=>'2xl',
//     'value'=>'',
//     'is_visible' => '1', 
//     'is_variation' => '1',
//     'is_taxonomy' => '1'
//     ));
//     update_post_meta( $variation_id,'_product_attributes',$thedata);

//     //Create xl variation for ea product_variation:
//     update_post_meta( $variation_two, 'attribute_pa_size', 'xl');
//     update_post_meta( $variation_two, '_price', 20.99 );
//     update_post_meta( $variation_two, '_regular_price', '20.99');
//     //add size attributes:
//     wp_set_object_terms($variation_two, $avail_attributes, 'pa_size');
//     $thedata = Array('pa_size'=>Array(
//     'name'=>'xl',
//     'value'=>'',
//     'is_visible' => '1', 
//     'is_variation' => '1',
//     'is_taxonomy' => '1'
//     ));
//     update_post_meta( $variation_two,'_product_attributes',$thedata);
    
//     //Create lg variation for ea product_variation:
//     update_post_meta( $variation_three, 'attribute_pa_size', 'lg');
//     update_post_meta( $variation_three, '_price', 18.99 );
//     update_post_meta( $variation_three, '_regular_price', '18.99');
//     wp_set_object_terms($variation_three, $avail_attributes, 'pa_size');
//     $thedata = Array('pa_size'=>Array(
//     'name'=>'lg',
//     'value'=>'',
//     'is_visible' => '1', 
//     'is_variation' => '1',
//     'is_taxonomy' => '1'
//     ));
//     update_post_meta( $variation_three,'_product_attributes',$thedata);

//     //Create md variation for ea product_variation:
//     update_post_meta( $variation_four, 'attribute_pa_size', 'md');
//     update_post_meta( $variation_four, '_price', 18.99 );
//     update_post_meta( $variation_four, '_regular_price', '18.99');
//     wp_set_object_terms($variation_four, $avail_attributes, 'pa_size');
//     $thedata = Array('pa_size'=>Array(
//     'name'=>'md',
//     'value'=>'',
//     'is_visible' => '1', 
//     'is_variation' => '1',
//     'is_taxonomy' => '1'
//     ));
//     update_post_meta( $variation_four,'_product_attributes',$thedata);

//     //Create sm variation for ea product_variation:
//     update_post_meta( $variation_five, 'attribute_pa_size', 'sm');
//     update_post_meta( $variation_five, '_price', 18.99 );
//     update_post_meta( $variation_five, '_regular_price', '18.99');
//     wp_set_object_terms($variation_five, $avail_attributes, 'pa_size');
//     $thedata = Array('pa_size'=>Array(
//     'name'=>'sm',
//     'value'=>'',
//     'is_visible' => '1', 
//     'is_variation' => '1',
//     'is_taxonomy' => '1'
//     ));
//     update_post_meta( $variation_five,'_product_attributes',$thedata);

// $i++;
// }//end while i is less than or equal to 5(for 5 size variations)
// 	//############################ Done adding variation posts ############################

// 	update_post_meta( $post_id, '_sale_price_dates_from', "" );
// 	update_post_meta( $post_id, '_sale_price_dates_to', "" );
// 	update_post_meta( $post_id, '_price', "1" );
// 	update_post_meta( $post_id, '_sold_individually', "" );
// 	update_post_meta( $post_id, '_manage_stock', "no" );
// 	update_post_meta( $post_id, '_backorders', "no" );
// 	update_post_meta( $post_id, '_stock', "" );
// 	update_post_meta( $post_id, '_downloadable_files', '');
// 	update_post_meta( $post_id, '_download_limit', '');
// 	update_post_meta( $post_id, '_download_expiry', '');
// 	update_post_meta( $post_id, '_download_type', '');
// 	update_post_meta( $post_id, '_product_image_gallery', '');

    require_once URL_API . 'NhanhService.php';
    $service = new NhanhService();
    $storeId = null;
	$response_category = $service->sendRequest(NhanhService::URI_GET_PRODUCT_CATEGORY, 'productcategory', $storeId);
	
    function has_child( $array , $parent_id = '', $parent_code = '' ){
		global $wpdb;
		$array_category = (array)$array;
        foreach ($array_category as $key => $value) {
			if( $value->parentId == $parent_id ){

				$name = $value->name;
				$slug = $value->code;
				$taxonomy = 'product_cat';
				$rows = $wpdb->get_results("SELECT * FROM `wpni_terms` WHERE slug='{$parent_code}'  ");			
				if( $rows[0]->term_id == '' ){
					wp_insert_term(
						$name, // the term 
						'product_cat', // the taxonomy
						array(
						  'description'=> '',
						  'slug' => $slug,
						  'parent'=> ''  // get numeric term id
						)
					);
				}else{
					wp_insert_term(
						$name, // the term 
						'product_cat', // the taxonomy
						array(
						  'description'=> '',
						  'slug' => $slug,
						  'parent'=> $rows[0]->term_id  // get numeric term id
						)
					);
				}
				if( is_array($value->childs) ){
					has_child( $value->childs, $value->id , $value->code  );
				}
			}
		}

    }
    if( $response_category->code ){
        has_child( $response_category->data );
	}
}
