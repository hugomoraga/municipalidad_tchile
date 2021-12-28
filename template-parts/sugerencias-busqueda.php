<style>
    @media (min-width: 992px) and (max-width: 1400px) {
    .fix-size {
        height: 200px;
}
    }
    </style>

<div class="fix-size pt-3">
<?php $sugestions = get_menu_items_by_slug("search_sugestions"); 
$max = !empty($args['max'])? $args['max'] : 10;

$i = 0;
foreach ($sugestions as $item):
    $title = get_sugestion_title($item);
    echo "<a class='btn btn-outline-primary border border-secodnary border-2 rounded-pill px-3 py-2 m-2 ' href='$item->url'>$title</a>";
    
    if ($i > $max)
        break;
    $i++;
endforeach;
?>
</div>

