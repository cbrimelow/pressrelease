<?php
/*
* Business Booster widget Class.
*
*/
class Business_Booster_Recent_Themes_Widget extends WP_Widget {
	
	function __construct() {

		parent::__construct(

			'Business_Booster_Recent_Themes_Widget',  // Base ID

			__('Business Booster Recent Post Widget','business-booster'),// Title Name

			array(

				'description' => __( 'Business booster recent post', 'business-booster' ), 

			),

			array(

				'width' => 600,

			)
		
		);
		
	}
	
	/**
	 * Outputs the content for the current widget instance.
	 *
	 * Display arguments
	 */	

	function widget( $args, $instance ) 
	{
		echo $args['before_widget']; 
		
		$widget_id = $args['widget_id'];
	
		global $wpdb,$post;
					
		$business_booster_post_catid = isset($instance['business_booster_post_select_category'])?$instance['business_booster_post_select_category']:'';
		
		$business_booster_recent_posts = isset($instance['business_booster_recent_posts'])?$instance['business_booster_recent_posts']:'';
		
		if($business_booster_recent_posts=='')
		{
			$business_booster_recent_posts='-1';
		}
		
		$category_names = get_category_by_slug($business_booster_post_catid );
		
		if ( $category_names instanceof WP_Term ) {

			$category_name= esc_html($category_names->name);
		
		}else{
			
			$category_name= esc_html_e('All Categories','business-booster');
		
		}
			
		$args_recent_post = array(
			'posts_per_page'   => absint($business_booster_recent_posts),
			'offset'           => 0,
			'category_name'    => esc_html($business_booster_post_catid),
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts_array = get_posts( $args_recent_post );	
		
		?>
		<div class="business_booster_style_head_rec">
			
			<div class="business_booster_recent_post_wrap">
				
				<?php
				
				foreach($posts_array as $key=>$post_data)
				{
					$post_id = $post_data->ID;
					
					$post_attached_image = wp_get_attachment_url( $post_id );

					?>
						<div class="business_booster_post_main">
							
							<div class="business_booster_image"><a href="<?php the_permalink($post_id); ?>"><?php  echo get_the_post_thumbnail( $post_id, 'thumbnail' ); ?></a></div>
							
							<div class="business_booster_headline_date">
							
								<h3 class="business_booster_post_headline"><a href="<?php the_permalink($post_id); ?>"><?php echo esc_html($post_data->post_title); ?></a></h3>
								
								<?php
									
									$post_date = $post_data->post_date ;
									
									$createDate = new DateTime($post_date);
									
									$post_datestrip = $createDate->format('Y-m-d');
								
								?>
								
								<span class="business_booster_rec_post_date"><?php echo esc_html($post_datestrip); ?></span>
						
							</div>
							
						</div>
						
					<?php
				
				}
				
				?>
			</div>
			
		</div>
			<?php
			
			echo $args['after_widget']; 
	}
	
/**
         * Sets up a new widget instance.
         * display content on backend
     */

	public function form( $instance ) {
	
		
		global $wpdb,$post;
		
		$business_booster_args_style2 = array(
				'type'                     => 'post',
				'child_of'     	           => 0,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'taxonomy'                 => 'category',
				'pad_counts'               => false
				
		);
		
		$business_booster_all_recent_post_data = get_terms($business_booster_args_style2);
	
		?>
		
			<table class="form-table">
				
				<tbody>	
				
					<tr>
				
						<th>
						
							<label><?php esc_html_e('Selected Category','business-booster'); ?> </label>
							
						</th>
						
							<td>
							
								<?php $selected_cat=isset($instance['business_booster_post_select_category']) ? $instance['business_booster_post_select_category']:''; ?>
							
								<select name="<?php echo esc_attr($this->get_field_name('business_booster_post_select_category')); ?>">
								
									<option value=""><?php esc_html_e('All Categories','business-booster'); ?></option>
									<?php
										foreach($business_booster_all_recent_post_data as $keys =>$all_pro_val)
										{
											
											$reword_pro_id = esc_html($all_pro_val->slug);
											
											$reword_pro_name = esc_html($all_pro_val->name);
											
											?>
											
											<option value="<?php echo esc_attr($reword_pro_id); ?>" <?php selected( $selected_cat, $reword_pro_id ); ?> ><?php echo esc_html($reword_pro_name); ?></option>
											
											<?php
										}
									?>
								</select>
							
							</td>
						
					</tr>
					
					<tr>
				
						<th>
						
							<label><?php esc_html_e('Number of Posts','business-booster'); ?> </label>
							
						</th>
						
						<td>
						
							<input  min="1"  name="<?php echo esc_attr($this->get_field_name( 'business_booster_recent_posts' )); ?>" type="number" value="<?php echo (isset($instance['business_booster_recent_posts']) && $instance['business_booster_recent_posts'] !='')?esc_attr($instance['business_booster_recent_posts']):'1'; ?>">
						
						</td>
						
					</tr>
					
				</tbody>
					
			</table>		
		<?php
	
	}
	
/**
* Save data in database.
* Update instance
*/
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
	
		$instance['business_booster_post_select_category']=sanitize_text_field($new_instance['business_booster_post_select_category']);
		
		$instance['business_booster_recent_posts']=absint($new_instance['business_booster_recent_posts']);
	
		return $instance;
	}
	
//end of class	

}

/**
* Register Widget class
* Load widgets.
*/

function business_booster_recent_post_widget_register() 
{

    register_widget( 'Business_Booster_Recent_Themes_Widget' );
	
}
add_action( 'widgets_init', 'business_booster_recent_post_widget_register' );
?>