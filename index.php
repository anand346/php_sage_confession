<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <header>
    <div class="content">
      <h2 class = "heading">SAGE Confession Website</h2>
    </div>
  </header>
  <section>
    <div class="user-content">
      <form action="save-confession.php" method = "POST">
        <div class="input-box">
          <textarea name="confession" id="confession" cols="100" rows="10" placeholder = "Enter your confession here"></textarea>
        </div>
        <div class="input-box">
          <input type="submit" name = "submit" id = "submit" value = "submit">
        </div>
      </form>
    </div>
    <?php
         include "config.php";
          session_start();
          // Function to get the client IP address
function get_client_ip() {
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
      $ipaddress = '0.0.0.0';
  return $ipaddress;
}


       $_SESSION['client_ip'] = get_client_ip();
      //  die("your ip is :".$_SESSION['client_ip']);
      //  var_dump($_SESSION['client_ip']);die();
         $sql = "SELECT * FROM confessions ORDER BY id DESC";
         $result = mysqli_query($conn,$sql);
         if(mysqli_num_rows($result) > 0){
        ?>
      <div class="confession-show">
          <table>
            <tr>
              <th>Id</th>
              <th>Confession</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php  echo $row['confession'];?></td>
            </tr>
            <?php
               }
            ?>
          </table>
      </div>
      <?php
        }
      ?>
  </section>
  <div class="footer">

    <pre><p>Developer : <span>Anand Raj</span>         Tester : <span>Faiyaz Ahmed</span></p></pre>
  </div>
</body>
</html>