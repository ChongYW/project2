<?php
include 'dbh.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="" type="" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var commentCount = 2;
            $("button").click(function() {
                commentCount = commentCount + 2;
                $("#comments").load("load-comments.php", {
                    commentNewCount: commentCount

                });
            });
        });
    </script>
</head>

<body>
    <div id="comments">

        <?php
        $sql = "SELECT * FROM comments LIMIT 2";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>";
                echo $row['author'];
                echo "<br>";
                echo $row['message'];
                echo "</p>";
            }
        } else {
            echo "No comments...";
        }
        ?>

    </div>

    <button>Show more comments</button>
</body>

</html>