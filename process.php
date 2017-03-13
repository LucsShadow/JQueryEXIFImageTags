<?php
/**
 * Document   : EXIF Tag Script
 * Author     : josephtinsley
 * Description: Read a image EXIF meta data with PHP HTML/JQuery/PHP. 
 * http://twitter.com/josephtinsley 
*/

$dir = './images/';
$files = scandir($dir);

$ext_list = ['jpg', 'gif', 'png'];

foreach($files as $image_file)
{
    $l = strtolower($image_file);
    $parse_file_name = explode(".", $l);
    $file_ext = end($parse_file_name); 
    
    if(in_array($file_ext, $ext_list) )
    {
        $exif_data = exif_read_data($dir.$image_file);
        $photos[] = [
            'FileName'      =>$exif_data['FileName'],
            'Model'         =>$exif_data['Model'],
            'ExposureTime'  =>$exif_data['ExposureTime'],
            'FNumber'       =>$exif_data['FNumber'],
            'ISOSpeedRatings'=>$exif_data['ISOSpeedRatings'],
            'FocalLength'   =>$exif_data['FocalLength'],
        ];

    } 
}

/*
[FileName]
[Model]
[ExposureTime] => 1/60
[FNumber] => 5/1
[ISOSpeedRatings]
[FocalLength]
 */
?>

<?PHP foreach($photos as $data): ?>
   <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
     <div class="thumbnail">
         <img src="<?PHP echo $dir.$data['FileName'];?>" alt="<?PHP echo $data['FileName'];?>" class="img-responsive">
         <div class="caption">
             <ul>
                 <li><label>FileName:</label><?PHP echo $data['FileName'];?></li>
                 <li><label>Model:</label><?PHP echo $data['Model'];?></li>
                 <li><label>ExposureTime:</label><?PHP echo $data['ExposureTime'];?></li>
                 <li><label>FNumber:</label><?PHP echo $data['FNumber'];?></li>
                 <li><label>ISOSpeedRatings:</label><?PHP echo $data['ISOSpeedRatings'];?></li>
                 <li><label>FocalLength:</label><?PHP echo $data['FocalLength'];?></li>
             </ul>
         </div>
     </div>
   </div>
<?PHP endforeach;?>