<style>
.container-iframe {
    position: relative;
    overflow: hidden;
    width: 100%;
    padding-top: 56.25%;
    /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
}
</style>

<?php
$channel_id = 'UC9FG88VWjeR6KaGqaimeEgA';
$feed_link = 'https://www.youtube.com/feeds/videos.xml?channel_id='.$channel_id;
$feed_data = json_encode(simplexml_load_string(file_get_contents($feed_link)));
$feed_array = json_decode($feed_data,TRUE);
$listavideos=array();

foreach ($feed_array['entry'] as $entry) {
    array_push($listavideos,  $entry['link']['@attributes']['href']);
}

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

$urlyoutubeembed = getYoutubeEmbedUrl($listavideos[0]);

echo '<div class="p-4"><div class="container-iframe"><iframe class="responsive-iframe" src="'.$urlyoutubeembed.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>'; 

?>

<div class="pt-2 elementor-element elementor-element-2a6ba94 elementor-widget elementor-widget-html" data-id="2a6ba94"
    data-element_type="widget" data-widget_type="html.default">
    <div class="elementor-widget-container">
        <div class="d-flex flex-row-reverse"> <a href="https://www.youtube.com/channel/UC9FG88VWjeR6KaGqaimeEgA"
                class="btn btn-primary rounded-pill text-white" target="_blank">
                Ver más
                <i class="fas fa-chevron-circle-right fa-lg " style="vertical-align: -0.1em; margin-left:1px"></i>
            </a>
        </div>
    </div>
</div>
</div>