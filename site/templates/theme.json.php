<?php

$data = $page->children()->listed();
$json = [];
$count = 0;
$count2 = 0;

foreach($data as $article) {
  $json[$count]['title'] = (string)$article->title();
  $json[$count]['text'] =  (string)$article->bodytext();
  // if ($article->hasListedChildren()) {
  //     foreach ($article->children() as $project) {
  //         $json[$count]['children'][$count2]['subtitle'] = (string)$project->title();
  //         $json[$count]['children'][$count2]['text'] = (string)$project->bodytext();
  //           $count2++;
  //     }
  // }
  
 $count++;
}

echo json_encode($json);
