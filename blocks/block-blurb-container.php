<?php
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;
?>
<div class="blurb-container row<?php echo $className; ?>">
    <InnerBlocks />
</div>