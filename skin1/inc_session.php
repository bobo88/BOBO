<?php
if(isset($_SESSION['userid'])){
      $sql = "SELECT * FROM user WHERE id='".$_SESSION['userid']."'";//取手机号码数据
      $results = $link->query($sql);

      if($results){
            if($results->num_rows>0){ //查到结果，手机号码已经注册过
            while ($row = $results->fetch_array()){
                $currentNickname = $row['name'];
                $currentName = $row['username'];
                $currentEmail = $row['email'];
            }
            }
      }else{ //查询失败
            echo $link->error;
      }
}
//查询演示案例数据
$demoFirstsql = "SELECT d.title, d.demoUrl, d.demoImg FROM democase AS d ORDER BY d.caseid DESC LIMIT 1";
$demoFirstresults = $link->query($demoFirstsql);
while ($row = $demoFirstresults->fetch_array()){
  $demoFirstTitle = $row['title'];
  $demoFirstUrl = $row['demoUrl'];
  $demoFirstImg = $row['demoImg'];
}

?>