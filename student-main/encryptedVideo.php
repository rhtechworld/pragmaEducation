<?php include('../config.php'); ?>
<?php

if(isset($_GET['token']) && isset($_GET['trackId']))
{
    $baseKey = $_GET['token'];
    $trackId = $_GET['trackId'];

    //getMappedVideoByToken
    $getVideoIdNowHere = mysqli_query($conn,"SELECT * FROM course_video_tracking WHERE access_token='$baseKey' AND track_id='$trackId'");
    
    $makeCountOnItNow = mysqli_num_rows($getVideoIdNowHere);
    
    if($makeCountOnItNow == 0)
    {
        echo '<b>Invalid Token / Token Expired!, Refresh The Page or Relogin Again!</b>'; 
    }
    else
    {
        while($row = mysqli_fetch_array($getVideoIdNowHere))
        {
            $track_id = $row['track_id'];
            $access_token = $row['access_token'];
            $token_count = $row['token_count'];
            $video_id = $row['video_id'];
        }
        
        $updatedTokenCount = $token_count + 1;
        
        if($updatedTokenCount == 1)
        {
            //update token count  
            $updateTokenCountNow = mysqli_query($conn,"UPDATE course_video_tracking SET token_count='$updatedTokenCount' WHERE access_token='$baseKey'");
            
            echo '
        
            <iframe src="https://drive.google.com/file/d/'.$video_id.'/preview" style="width:100%;" height="680" allow="autoplay" allowFullScreen></iframe>
            
            ';
        }
        else
        {
            echo '<b>Token Expired!, Refresh The Page or Relogin Again!</b>';
        }
    }

}
else
{
    echo '<b>Token Expired!, Refresh The Page or Relogin Again!</b>';
}

?>
