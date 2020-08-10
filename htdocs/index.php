<?php
function print_title()
  {
    if(isset($_GET['id']))
    {
      echo $_GET['id'];
    } 
    else 
    {
      echo "Welcome";
    }  
  }

  function print_description()
  {
    if(isset($_GET['id'])){
      echo file_get_contents("data/".$_GET['id']);
    } else {
      echo "Hello, PHP";
    }
  }

  function print_list()
  {
    $list = scandir('./data');
        
    $i = 0;
    while($i < count($list))
    {
      if($list[$i] != '.') 
      {
        if($list[$i] != '..') 
        {
          echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
        }
      }
      $i = $i + 1;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    <?php
      print_title();
    ?>
    </title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?php
        print_list();
      ?>
    </ol>
    <a href="Create.php">Create</a>

    <?php if(isset($_GET['id'])) 
    { ?>
      <a href="Update.php?id=<?=$_GET['id'];?>">Update</a>

      <form action="delete_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" value="삭제">
      </form>
    <?php 
    } ?>
    <h2>
      <?php
        print_title();
      ?>
    </h2>
    <?php
      print_description();
    ?>
  </body>
</html>