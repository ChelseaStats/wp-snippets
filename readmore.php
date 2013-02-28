/* Add a readmore to excerpt for WordPress */

function tcr_excerpt_readmore($more) {
        return '... <a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'tcr_excerpt_readmore');
