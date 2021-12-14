



<?php

    $q=$_GET["q"];
    


    $con = mysqli_connect('localhost','root','','book_shop');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM book_info WHERE Title LIKE '%{$q}%'";
    $result = mysqli_query($con,$sql);

    
    echo '<table id="tableEmp1"  align="center"  style="padding: 25px;" width="70%">
    <tr>
    <th>Title</th>
     <th>Author Name</th>
     <th>Edition</th>
     <th>Adding Date</th>
     <th>Publish Date</th>
     <th>Genre</th>
    </tr>';

    while($row = mysqli_fetch_array($result)) {
        //echo "succes";
    echo "<tr>";

        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Author_Name'] . "</td>";
        echo "<td>" . $row['Edition'] . "</td>";
        echo "<td>" . $row['Adding_Date'] . "</td>";
        echo "<td>" . $row['Publish_Date'] . "</td>";
        echo "<td>" . $row['Genre'] . "</td>";
        //$username=$row['User_Name'];
       // echo '<td><button style= "background-color: red" onclick="deleteEmployee(\''.$username.'\')">Delete</button></td>';
        echo "</tr>";
    }
    echo "</table>";
    

    mysqli_close($con);

  ?>