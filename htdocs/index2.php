<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>네이버</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
    <?php
        $list = scandir('data');
        $i = 0;
        while($i<count($list))
        {
            if($list[$i] != '.')
            {
                if($list[$i] != '..')
                {
                    ?>
                    <li><a href="index.php?id=<?=$list[$i]?>"><?=$list[$i]?><a/></li>
                    <?php
                }
            }
            $i = $i + 1;
        }
    ?>
    </ol>
    <h2>
        <?php 
            if(isset($_GET['id']))
            {
                echo $_GET['id'];
            }
            else
            {
                echo "Welcom";
            }
        ?>
    </h2>
    <?php 
        if(isset($_GET['id']))
        {
            echo file_get_contents("data/".$_GET['id']);
        }
        else
        {
            echo "About the web!";
        }        
    ?>

        
</body>
</html>