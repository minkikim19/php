<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

settype($_POST['id'], 'integer');
$filtered = array
(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);
$sql = 
"
    UPDATE author
        SET
            name = '{$filtered['name']}',
            profile = '{$filtered['profile']}'
        WHERE
            id = '{$filtered['id']}'
";
//die($sql);

$result = mysqli_query($conn, $sql);//정보 전달을 위한 함수 사용
if ($result == false)
    {
        echo 'There was a problem while saving. Please contact the administrator.';
        error_log(mysqli_error($conn));
    }
    else
    {
        header('Location: author.php?id='.$filtered['id']);
    }
?>