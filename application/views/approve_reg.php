<!DOCTYPE html>
<html>
<head>
</head>
<style>
table,tr,td
{
border:2px solid black;
padding:20px;
border-collapse:collapse;
margin:10px;
width:100px;

margin-top: 50px;

margin-right: 100px;
}

'.tb
{
font-family:Arial;
}

</style>
<body >
<center>

<form method="post" action="">
<h1></h1>

<table border="2" class="tb">


<tr>
<td>FirstNAME</td>
<td>LastName</td>
<td>Username</td>
<td>Mobile</td>
<td>EMAIL</td>
<td>ACTION</td>
<td>ACTION</td>
</tr>
<?php
if($n->num_rows()>0)
{
foreach($n->result()as $row)
{

?>



<tr>
<td>
<?php echo $row->firstname;?>
</td>
   <td>
    <?php echo $row->lastname;?>
   </td>
   <td>
    <?php echo $row->username;?>
   </td>
   
   <td>
    <?php echo $row->mobile;?>
   </td>
   <td>
    <?php echo $row->email;?>
   </td>
   <?php
   if($row->status==1)
   {
    ?>
    <td>Approved</td>
    <td>
    <a href="<?php echo base_url()?>Main/rejectdetail/<?php echo $row->id;?>">Reject</a>
   </td>
    <?php

   }
  elseif($row->status==2)
  {
  ?>
  <td>Rejected</td>
  <td>
    <a href="<?php echo base_url()?>Main/approvedetail/<?php echo $row->id;?>">Approve</a>
   </td>
  <?php
  }
  else
  {
  ?>

 
   <td>
    <a href="<?php echo base_url()?>Main/approvedetail/<?php echo $row->id;?>">Approve</a>
   </td>
   <td>
    <a href="<?php echo base_url()?>Main/rejectdetail/<?php echo $row->id;?>">Reject</a>
   </td>

</tr>
<?php
}

}
}

?>
</center>

</table>
</form>
</body>
</html>