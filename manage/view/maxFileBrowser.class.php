<?php
class maxFileBrowser {
   var $fileList;
   var $dirList;   
   var $dateFormat = 'd-m-Y H:i:s';

function displayDir($path='.'){
   $path = $this->getActualPath();     
   $this->showDirSelector($path); 
   $dn=dirname($path);
   $sp = strrpos($dn,DIRECTORY_SEPARATOR);
   $up = substr($path, 0, $sp);   
   if ($handle = @opendir($path))
   {
       echo "<table class='fileList'>";
       echo "<tr><th width='16'></th><th>Name</th><th width='70'>Size</th><th width='30'>Perm.</th><th width='120'>Date</th></tr>";
       echo "<tr><td><img src='style/images/up.gif' alt='Dir' /></td><td colspan='4'><center><a href='".$_SERVER['PHP_SELF']."?path=$dn'>Up one level</a></center></td></tr>";
        
       while (false !== ($file = readdir($handle)))
       {
           if ($file != "." && $file != "..")
           {
               $fName = $file;
               $file = $path.DIRECTORY_SEPARATOR.$file;
               if(is_file($file)) {
                  $this->fileList[] = $file;
               } elseif (is_dir($file)) {
                   $this->dirList[] = $file;
               }
           }
       }
       
       $i = 0;
       if (sizeof($this->dirList) > 0){
          sort($this->dirList);  
          foreach ($this->dirList as $dir) {
              $size = filesize($dir);
              $perm = substr(sprintf('%o', fileperms($dir)), -4);
              if (function_exists('mime_content_type'))
                  $type = mime_content_type($dir);
              else 
                  $type = filetype($dir);       
              $date = date ($this->dateFormat, filemtime($dir));;
              $name = basename($dir);
              if ($i++%2) echo "<tr>";
              else echo "<tr class='tr2'>";
              echo "<td><img src='style/images/dir.gif' alt='Dir'/></td><td class='fname'><a href='".$_SERVER['PHP_SELF']."?path=$dir'>$name</a></td><td>$size</td><td>$perm</td><td>$date</td></tr>";	
          }
       }

       if (sizeof($this->fileList) > 0){
          sort($this->fileList);  
          foreach ($this->fileList as $file) {
              $size = number_format(filesize($file), 0, ' ', ' ');
              $perm = substr(sprintf('%o', fileperms($file)), -4);
              if (function_exists('mime_content_type'))
                  $type = mime_content_type($file);
              else 
                  $type = filetype($file);       
              $date = date ($this->dateFormat, filemtime($file));
              $name = basename($file);
              
              if ($i++%2) echo "<tr>";
              else echo "<tr class='tr2'>";
              echo "<td><img src='style/images/file.gif' alt='File' /></td><td class='fname'>$name</td><td>$size</td><td>$perm</td><td>$date</td></tr>";	
          }
       }
       
       closedir($handle);
       echo "</table>";
   }	

}

function showDirSelector($actpath='.'){
?>    
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
      <p class="path">
        Path: <input class="text" name="path" type="text" size="50" value="<?php echo $actpath; ?>" />
            <input class="text" type="submit" name="submitBtn" value="List content" />
      </p>      
   </form>
<?php
}
   
function getActualPath(){
    if (isset($_POST['submitBtn'])){
        $dir = isset($_POST['path']) ? trim($_POST['path']) : getcwd();
    } else if (isset($_GET['path'])) {
        $dir = isset($_GET['path']) ? trim($_GET['path']) : getcwd();
    } else {
        $dir = getcwd();
    }

    if (!file_exists($dir)) $dir = getcwd();
    
    return $dir;
}
}
?>