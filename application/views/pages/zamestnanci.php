<html>
    <head>
        <title>Zaměstnanci</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet/less" type="text/css" href="styles.less">
        <script src="less.js" type="text/javascript"></script>
        <style>  
input{
    width: 35%;
    height: 5%;
    border: 1px;
    border-radius: 03px;
    padding: 4px 10px 4px 12px;
    margin: 5px 0px 1px 0px;
    box-shadow: 1px 1px 2px 1px grey;
}
.jumbotron{
    background-color:#00FFFF;
}
        </style>
    </head>
    <body style="background-color:lightblue;">
        
        <div class="row">
        <div class="col-2">
        </div>
            
        <div class="col-8">
        <div class="text-center" style="color:black">
     <h1><b>Seznam zaměstnanců AZpneu</b></h1>
    <table class="table table-bordered table-striped table-light">               
    <tr>
    <div class="table-header">
         <th scope="col"  class="text-center"  >Pořadí</th>
          <th scope="col"  class="text-center" >Jméno</th>
          <th scope="col"  class="text-center" >Příjmení</th>
          <th scope="col"  class="text-center" >Osobní číslo</th>
             </tr>
    <?php foreach ($zamestnanci as $zam) { ?>
        <tr>
            <td class="text-center"> <?= $zam->id; ?></td>
            <td class="text-center"><?= $zam->jmeno; ?></td>
            <td class="text-center"><?= $zam->prijmeni; ?></td>
            <td class="text-center"><?= $zam->osobni_cislo; ?></td>
        </tr>
    <?php } ?>
        </table>
            <center>
            <div class="col-5">
                <button type="button" class="btn btn-blue">
                <a class="nav-link text-dark" href="formular">Zpět na menu</a>
            </div> 
            </center>
            <div><br>&nbsp</div>
        </div> 
        </div>
        <div class="container">
        <div class="jumbotron">
    <center>
        <h2> Úprava jednotlivých zaměstnanců</h2>
        
        <form action="" method="POST">
        <input type="text" name="id" placeholder="Zadejte ID zaměstnance"/><br/>
            <input type="text" name="jmeno" placeholder="Zadejte jméno zaměstnance"/><br/>
            <input type="text" name="prijmeni" placeholder="Zadejte příjmení zaměstnance"/><br/>
            <input type="text" name="osobni_cislo" placeholder="Zadejte osobní číslo zaměstnance"/><br/>
            
            <input type="submit" name="update" value="Klikněte pro upravení dat">
        </form>
    </center>
        </div>
            <div class="jumbotron">
    <center>
        <h2> Smazání dat zaměstnance zadaním ID</h2>
        <form action="" method="post">

            &nbsp;<input type="text" name="id" placeholder="Zadejte ID zaměstnance pro smazaní" required><br><br>

            <input type="submit" name="delete" value="Klikněte pro smazání dat o zaměstnanci">
        </form>
                   </center>
            </div>
            <div class="jumbotron">
              <center>
        <h2> Přidání nového zaměstnance</h2>
        <form action="" method="POST">
        <input type="text" name="jmeno" placeholder="Zadejte jméno zaměstnance"/><br/>
            <input type="text" name="prijmeni" placeholder="Zadejte příjmení zaměstnance"/><br/>
            <input type="text" name="osobni_cislo" placeholder="Zadejte osobní číslo zaměstnance"/><br/>
            <input type="submit" name="insert" value="Klikněte pro přidání dat zaměstnance">
        </form>
    </center>
    </body>
</html>
<?php


$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'auto_servis');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    
    $query = "UPDATE `zamestnanci` SET jmeno='$_POST[jmeno]',prijmeni='$_POST[prijmeni]',osobni_cislo='$_POST[osobni_cislo]' where id='$_POST[id]' ";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
        echo '<script type="text/javascript"> alert("Data byla upravena v databázi") </script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("Data nebyla upravena v databázi") </script>';
    }
}
?>
<?php

// smazání dat z databáze
// php code to Delete data from mysql database 

if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "auto_servis";
    // get id to delete
    $id = $_POST['id'];
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql delete query 
    $query = "DELETE FROM zamestnanci WHERE id = $id";
    
    $result = mysqli_query($connect, $query); 
    if($result)
    {
        echo '<script type="text/javascript"> alert("Data byla úspěšně smazána z databáze") </script>';
    }else{
        echo '<script type="text/javascript"> alert("Data se bohužel nepodařilo smazat z databáze") </script>';
    }
    mysqli_close($connect);
}

?>
<?php

  

$connect = mysqli_connect("localhost","root","","auto_servis");
    if(isset($_POST['insert'])) {
        
        $jmeno = $_POST['jmeno'];
        $prijmeni = $_POST['prijmeni'];
        $osobni_cislo = $_POST['osobni_cislo'];
        
    if(!empty($jmeno) && !empty($prijmeni) && !empty($osobni_cislo) )   {
    
        
        $sql = "INSERT INTO `zamestnanci`(`jmeno`, `prijmeni`, `osobni_cislo`)"
                               . " VALUES ('$jmeno','$prijmeni','$osobni_cislo')" ;
    $qry = mysqli_query($connect, $sql);
    if($qry){
        echo '<script type="text/javascript"> alert("Zaměstnanec byl úspěšně zapsán do databáze") </script>';
    }   
        
    } else {
        echo '<script type="text/javascript"> alert("Všechny políčka musejí být vyplněné") </script>';
    }
     
    }

?>
