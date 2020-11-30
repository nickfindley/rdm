<?php
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;
?>
<div class="blurb-container<?php echo $className; ?>">
    <InnerBlocks />
</div>