<html>
    <head>
        <title>Formuláře</title>
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
     <h1><b>Seznam zákazníku AZpneu</b></h1>
    <table class="table table-bordered table-striped table-light">               
    <tr>
    <div class="table-header">
         <th scope="col"  class="text-center"  >Pořadí</th>
          <th scope="col"  class="text-center" >Jméno</th>
          <th scope="col"  class="text-center" >Příjmení</th>
          <th scope="col"  class="text-center" >Adresa</th>
          <th scope="col"  class="text-center" >Telefon</th>
          <th scope="col"  class="text-center" >E-mail adresa</th>
             </tr>
    <?php foreach ($zakaznik as $zak) { ?>
        <tr>
              <td class="text-center" ><?= $zak->id; ?></td>
              <td class="text-center" ><?= $zak->jmeno; ?></td>
            <td class="text-center" ><?= $zak->prijmeni; ?></td>
               <td class="text-center" ><?= $zak->adresa; ?></td>
             <td class="text-center" ><?= $zak->telefon; ?></td>
            <td class="text-center" ><?= $zak->email; ?></td>
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
        <h2> Upravení dat zákazníků</h2>
        <form action="" method="POST">
                  <input type="text" name="id" placeholder="Zadejte ID zákazníka"/><br/>
            <input type="text" name="jmeno" placeholder="Zadejte nové jméno zákazníka"/><br/>
            <input type="text" name="prijmeni" placeholder="Zadejte nové příjmení zákazníka"/><br/>
            <input type="text" name="adresa" placeholder="Zadejte novou adresu zákazníka"/><br/>
            <input type="text" name="telefon" placeholder="Zadejte nové telefoní číslo zákazníka"/><br/>
            <input type="text" name="email" placeholder="Zadejte novou email adresu zákazníka"/><br/>
            
            <input type="submit" name="update" value="Klikněte pro upravení dat">
        </form>
    </center>
        </div>
            <div class="jumbotron">
    <center>
        <h2> Smazání dat zákazníka zadaním jeho ID </h2>
        <form action="" method="post">

            &nbsp;<input type="text" name="id" placeholder="Zadejte ID zákazníka pro smazaní" required><br><br>

            <input type="submit" name="delete" value="Klikněte pro smazání dat o zákazníkovi">
        </form>
                   </center>
            </div>
            <div class="jumbotron">
              <center>
        <h2> Přidání nového zákazníka </h2>
        <form action="" method="POST">
        <input type="text" name="jmeno" placeholder="Zadejte jméno zákazníka"  /><br/>
            <input type="text" name="prijmeni" placeholder="Zadejte příjmení zákazníka"/><br/>
            <input type="text" name="adresa" placeholder="Zadejte adresu zákazníka"/><br/>
            <input type="text" name="telefon" placeholder="Zadejte telefoní číslo zákazníka"/><br/>
            <input type="text" name="email" placeholder="Zadejte email adresu zákazníka"/><br/>
            <input type="submit" name="insert" value="Klikněte pro přidání zákazníka">
        </form>
    </center>
    </body>
</html>

<?php

// update dat v databázi

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'auto_servis');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    
    $query = "UPDATE `zakaznici` SET jmeno='$_POST[jmeno]',prijmeni='$_POST[prijmeni]',adresa='$_POST[adresa]',telefon='$_POST[telefon]',email='$_POST[email]' where id='$_POST[id]' ";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
        echo '<script type="text/javascript"> alert(""Data byla upravena v databázi"") </script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert(""Data nebyla upravena v databázi"") </script>';
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
    $query = "DELETE FROM zakaznici WHERE id = $id";
    
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

// přidávání dat do databáze

    $connect = mysqli_connect("localhost","root","","auto_servis");
    if(isset($_POST['insert'])) {
        
        $jmeno = $_POST['jmeno'];
        $prijmeni = $_POST['prijmeni'];
        $adresa = $_POST['adresa'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        
    if(!empty($jmeno) && !empty($prijmeni) && !empty($adresa) && !empty($telefon) && !empty($email) )   {
    
        
        $sql = "INSERT INTO `zakaznici`(`jmeno`, `prijmeni`, `adresa`,`telefon`, `email`)"
                               . " VALUES ('$jmeno','$prijmeni','$adresa','$telefon','$email')" ;
    $qry = mysqli_query($connect, $sql);
    if($qry){
        echo '<script type="text/javascript"> alert("Zákazník byl úspěšně zapsán do databáze") </script>';
    }   
        
    } else {
        echo '<script type="text/javascript"> alert("Všechny políčka musejí být vyplněné") </script>';
    }
     
    }
?>

    </body>
</html>


