<?php
include("database.php");
$fetchData= fetch_data($connection);
show_data($fetchData);
// fetch query
function fetch_data($connection){
  $query="SELECT * from usertable ORDER BY id DESC";
  $exec=mysqli_query($connection, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>';
 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$sn."</td>
          <td>".$data['fullName']."</td>
          <td>".$data['emailAddress']."</td>
          <td>".$data['city']."</td>
          <td>".$data['country']."</td>
          <td><a href='javascript:void(0)' onclick='editData(".$data['id'].")'>Edit</a></td>
          <td><a href='javascript:void(0)' onclick='deleteData(".$data['id'].")'>Delete</a></td>   </tr>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>