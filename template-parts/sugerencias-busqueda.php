
<div class="col-lg-3 text-white p-3 bg-qn d-none d-lg-block bg-search bg-quenecesitas"
                style="background-color:#211c4c;">
                <div class="container p-0">
                    <div class="pt-2">
                        <p class="fs-4 text-center fw-bold text-white">¿Qué Buscas?</p>

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

                    </div>
                </div>
            </div>
        </div>
    </div