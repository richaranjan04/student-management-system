<html>

<head> 
<title>CAT EXAM </title>
<link href="lab6.css" rel="stylesheet" type="text/css">
<style>
  
    table {
    border-collapse: collapse;
    
    }

th, td {
    text-align: left;
    padding: 8px;
    }

tr{background-color: #f2f2f2}

th {
    background-color:black;
    color: white;
    }
</style>
</head>
    
<body>
   
    <div class="container">
       <h1> CAT EXAM PROCESS 
       <br><label style="color:darkblue;">SCOPE</label>
       </h1> 
       
       <h2>VIT UNIVERSITY ,VELLORE</h2>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "lab6");
 
        if ($mysqli === false) {
         die("ERROR: Could not connect. " .$mysqli->connect_error);
        }
 
        $sql = "SELECT * FROM assignment";
        if ($res = $mysqli->query($sql)) {
        if ($res->num_rows > 0) {
        echo "<table border=\"1\" align=\"center\">";
        echo "<tr>";
        echo "<th>Course Code</th>";
        echo "<th>Course Name</th>";
        echo "<th>Faculty Id</th>";
        echo "<th>Reg Num</th>";
        echo "<th>Student Name</th>";
        echo "<th>Faculty Name</th>";
        echo "<th>Student Branch</th>";
        echo "<th>Status</th>";
        echo "<th>CourseType</th>";
        echo "<th>Slot</th>";
        echo "</tr>";
        while ($row = $res->fetch_array()) 
        {
            echo "<tr>";
            echo "<td>".$row['coursecode']."</td>";
            echo "<td>".$row['coursename']."</td>";
            echo "<td>".$row['facultyid']."</td>";
            echo "<td>".$row['regnum']."</td>";
            echo "<td>".$row['studentname']."</td>";
            echo "<td>".$row['facultyname']."</td>";
            echo "<td>".$row['studentbranch']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>".$row['coursetype']."</td>";
            echo "<td>".$row['slot']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
    }
    else {
        echo "No matching records are found.";
    }
}
else {
    echo "ERROR: Could not able to execute $sql. "
                                             .$mysqli->error;
}
$mysqli->close();
?>
       
       

        
    </div> 
      
</body>

</html>




