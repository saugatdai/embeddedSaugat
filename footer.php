<?php if(is_front_page()): get_template_part('/template-parts/footer/footer','front');?>
<?php else: get_template_part('/template-parts/footer/footer','custom');?>

<?php endif;?>