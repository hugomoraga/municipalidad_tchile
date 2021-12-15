<style>
    @media (min-width: 992px) and (max-width: 1400px) {
    .fix-size {
        height: 200px;
}
    }
    </style>

<div class="pt-3 fix-size">
<?php $sugestions = get_menu_items_by_slug("search_sugestions"); 
$max = !empty($args['max'])? $args['max'] : 10;

$i = 0;
foreach ($sugestions as $item):
    $title = get_sugestion_title($item);
    echo "<a class='btn rounded-pill btn-outline-primary m-1 btn-sm border-2 border' href='$item->url'>$title</a>";
    
    if ($i > $max)
        break;
    $i++;
endforeach;
?>
</div>

