<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SQL Injection example</title>
</head>
<body>
    <?php 
        $conn = mysqli_connect('localhost','root','','lf_db');
//print_r($conn);
                $query = "SELECT * FROM sql_inject_target";
                $result = mysqli_query($conn, $query);
                print("<br>BEFORE: number of rows: ".mysqli_num_rows($result)."<br>");
                while($row=mysqli_fetch_assoc($result))
                {
                    print("Row: ".print_r($row,true));
                }

        if(isset($_POST['submit']))
        {
            if($_POST['submit']=='submit')
            {
                $query = "SELECT * FROM sql_inject_target WHERE name='$_POST[test]'";
                print("<br>bad query = $query<br>");
                $result = mysqli_multi_query($conn, $query);
                print("<br>AFTER: number of rows: ".mysqli_num_rows($result)."<br>");
                echo("error = ".mysqli_error($conn));
                
            }
            else if($_POST['submit']=='restore')
            {
                include('sql_injection_restore.php');
                //print("<br>query = $restore<br>");
                $result = mysqli_multi_query($conn, $restore);
                echo("error = ".mysqli_error($conn));
            }
        }
    ?>
    <form action="sql_injection.php" method="post">
        <input type="text" name="test" size="200" value="test'; truncate sql_inject_target; SELECT 'hello">
        <button name="submit" value="submit">Do it</button>
        <button name="submit" value="restore">Restore</button>
    </form>



</body>
</html>