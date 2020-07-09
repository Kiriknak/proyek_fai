<?php
class funct {
    public static function resize($uploadedfile){
  
        $foto = file_get_contents($uploadedfile);
            
        $resz = imagecreatefromstring($foto);
        $width = imagesx($resz);
        $height = imagesy($resz);
        $newWidth = 260;
        $newHeight = ($height / $width) * $newWidth;
        $tmp = imagecreatetruecolor($newWidth, 280);

        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
      
        $trans_colour = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefill($tmp, 0, 0, $trans_colour);
      
        while ($newHeight > 260 || $newWidth>250) {
            $newHeight = $newHeight * 0.9;
            $newWidth = $newWidth * 0.9;
        }
        // $newHeight = $newHeight * 0.9;
        // $newWidth = $newWidth * 0.9;
        $top=(280-($newHeight))/2;
        $left=(260-($newWidth))/2;
        imagecopyresampled($tmp, $resz, $left, $top, 0, 0, $newWidth, $newHeight, $width, $height);
        
        imagepng($tmp,$uploadedfile);
        
        $foto = addslashes(file_get_contents($uploadedfile));
        return $foto;
}}
?>