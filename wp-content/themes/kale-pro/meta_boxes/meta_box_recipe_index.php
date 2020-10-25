<?php
/**
 * Recipe Index Meta Box Form
 *
 * @package kale
 */
?>
<div class="meta_control">

<label><strong><?php echo esc_html__('Categories to Include', 'kale'); ?></strong></label>
<p><?php echo esc_html__('Check mark the categories you would like to show on this Recipe Index template. You can also drag and drop the categories in the order in which you would like to display them.', 'kale'); ?></p>
<p><input name="_recipe_index_meta[categories]" type="hidden" value="<?php if(!empty($meta['categories'])) echo $meta['categories']; ?>" size="40" /></p>
<?php 
$kale_selected_cats = array();
$kale_all_cats = array();
if(!empty($meta['categories'])) $kale_selected_cats = explode(',', $meta['categories']); 
?>
<p><ul id="kale-sortable-categories">
<?php 
//wp_category_checklist(0,0,$kale_selected_cats,'','', false); 
$all_categories = get_terms( 'category', array('orderby' => 'name') );
foreach($all_categories as $category)
	$kale_all_cats[] = $category->term_id;
	
$kale_unselected_cats = array_diff ($kale_all_cats, $kale_selected_cats);

if(count($kale_selected_cats)>0) {
    foreach($kale_selected_cats as $id){
        $checked = "checked='checked'";
        $name = get_cat_name($id);
        echo "<li id='category-".$id."' class=\"popular-category\"><label class=\"selectit\"><input value='".$id."' type=\"checkbox\" name=\"post_category[]\" id=\"in-category-".$id."\" $checked />". $name ."</label></li>";
    }
}

if(count($kale_unselected_cats)>0) {
    foreach($kale_unselected_cats as $id){
        $checked = "";
        $name = get_cat_name($id);
        echo "<li id='category-".$id."' class=\"popular-category\"><label class=\"selectit\"><input value='".$id."' type=\"checkbox\" name=\"post_category[]\" id=\"in-category-".$id."\" />". $name ."</label></li>";
    }
}
?>
</ul></p>

<label><strong><?php echo esc_html__('Posts Per Category', 'kale'); ?></strong></label>
<p><input name="_recipe_index_meta[number_of_posts]" type="number" step="1" required min="1" value="<?php if(!empty($meta['number_of_posts'])) echo $meta['number_of_posts']; ?>" size="40" /></p>

<!-- 
<label><strong><?php echo esc_html__('Category IDs', 'kale'); ?></strong></label>
<p><?php echo esc_html__('Enter category IDs separated by commas to override the default category order. Type them in the order you want to display them on the front end.', 'kale'); ?></p>
<p><input name="_recipe_index_meta[categories_override]" type="text" value="<?php if(!empty($meta['categories_override'])) echo $meta['categories_override']; ?>" size="40" /></p> 
-->


</div>