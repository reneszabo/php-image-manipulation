<?php
require_once __DIR__ . '/../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = [];
  $type = $_POST['type']*1;
  if(!is_nan($type)){
    $imageOriginal = \WideImage\WideImage::load('myimg');
    $image = $imageOriginal->copy();
    $quality = 100;
    switch ($type){
      case 1:
        //nothing;
        break;
      case 2:
        $image = $image->resize('25%');
        break;
      case 3:
        $image = $image->resize('50%');
        break;
      case 4:
        $quality = 5;
        break;
      case 5:
        $quality = 50;
        break;
      case 6:
        $watermark = \WideImage\WideImage::load(__DIR__ . '/water.png');
        $watermark = $watermark->resize("5%");
        if($image->getWidth()<150){
          $image = $image->resize('200');
        }
        $image = $image->merge($watermark, 'right', 'bottom – 10', 50);
        break;
    }
    $data['data'] = base64_encode($image->asString('jpg',$quality));
    $data['width'] = $image->getWidth();
    $data['height'] = $image->getHeight();
  }
  header("Content-Type: application/json");
  echo json_encode($data);

}