<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

settype($_POST['id'], 'integer');
$filtered = array
(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = 
"
    DELETE
        FROM topic;
        WHERE author_id= {$filtered['id']}
";
mysqli_query($conn, $sql);

$sql = 
"
    DELETE
        FROM author
        WHERE id= {$filtered['id']}
";
//exit;삭제 명령 비활성화
$result = mysqli_query($conn, $sql);//정보 전달을 위한 함수 사용
if ($result == false)
    {
        echo 'There was a problem while Deleteing. Please contact the administrator.';
        error_log(mysqli_error($conn));
    }
    else
    {
        header('Location: author.php');
    }
?>