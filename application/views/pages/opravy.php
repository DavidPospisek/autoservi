<html>
    <head>
        <title>Opravy a vozidla a náhradní díly</title>
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
             <div class="row">
                          <div class="col-2">
                    </div>
        </div>
            <div class="col-8">
            <div class="text-center" style="color:black">
            <h1><b>Seznam oprav AZpneu</b></h1>
            <table class="table table-bordered table-striped table-light">               
    <tr>
           <th scope="col" class="text-center"  >Pořadí</th>
         <th scope="col" class="text-center" >Datum</th>
        <th scope="col"class="text-center" >Zaměstnanec</th>
        <th scope="col"class="text-center" >Popis závady</th>
      <th scope="col"class="text-center" >Vyměněná součástka</th>
          <th scope="col"class="text-center" >Čas opravy</th>
       <th scope="col"class="text-center" >Náklady na opravu</th>
       <th scope="col"class="text-center" >Náklady za čas opravy</th>
    </tr>
    <?php foreach ($oprava as $opr) { ?>
        <tr>
            <td class="text-center" ><?= $opr->id; ?></td>
            <td class="text-center" ><?= $opr->datum; ?></td>
            <td class="text-center" ><?= $opr->zamestnanec; ?></td>
            <td class="text-center" ><?= $opr->popis_zavady; ?></td>
            <td class="text-center" ><?= $opr->vymenene_soucastky; ?></td>
            <td class="text-center" ><?= $opr->cas_opravy; ?></td>
            <td class="text-center" ><?= $opr->naklady_na_opravu; ?></td>
            <td class="text-center" ><?= $opr->naklady_za_cas; ?></td>
        
        
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
            </div>
            <div class="container">
        <div class="jumbotron">
    <center>
             <h2> Upravení dat oprav AZpneu </h2>
         <form action="" method="POST">
             <input type="text" name="id" placeholder="Zadejte ID opravy"/><br/>
              <input type="text" name="datum" placeholder="Zadejte nové datum opravy"/><br/>
              <input type="text" name="zamestnanec" placeholder="Zadejte nového zaměstnance"/><br/>
              <input type="text" name="popis_zavady" placeholder="Zadejte nový popis závady"/><br/>
              <input type="text" name="vymenene_soucastky" placeholder="Zadejte nové vyměněné součástky"/><br/>
              <input type="text" name="cas_opravy" placeholder="Zadejte novou dobu opravy"/><br/>
              <input type="text" name="naklady_na_opravu" placeholder="Zadejte nové náklady na opravu"/><br/>
              <input type="text" name="naklady_za_cas" placeholder="Zadejte nové náklady za čas opravy"/><br/>
            
            <input type="submit" name="update" value="Klikněte pro upravení dat">
        </form>
    </center>
        </div>
        </div>
            </div>
              
              
               <div class="container">
        <div class="jumbotron">
    <center>
           <h2> Smazání dat opravy zadáním ID </h2>
              <form action="" method="post">
               &nbsp;<input type="text" name="id" placeholder="Zadejte ID opravy pro smazání " required><br><br>
                      <input type="submit" name="delete" value="Klikněte pro smazání dat o opravách">
          </form>
    </center>
            </div>
            </div>
                <div><br>&nbsp</div>
                </div>
        </div>
            </div>
            <div class="container">
        <div class="jumbotron">
    <center>
        <h2> Přidání nové opravy do databáze </h2>
           <form action="" method="POST">
              <input type="text" name="datum" placeholder="Zadejte datum opravy"/><br/>
              <input type="text" name="zamestnanec" placeholder="Zadejte zaměstnance"/><br/>
              <input type="text" name="popis_zavady" placeholder="Zadejte popis závady"/><br/>
              <input type="text" name="vymenene_soucastky" placeholder="Zadejte vyměněné součástky"/><br/>
              <input type="text" name="cas_opravy" placeholder="Zadejte dobu opravy"/><br/>
              <input type="text" name="naklady_na_opravu" placeholder="Zadejte náklady na opravu"/><br/>
              <input type="text" name="naklady_za_cas" placeholder="Zadejte náklady za čas opravy"/><br/>
             <input type="submit" name="insert" value="Přidat data">
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
    
    $query = "UPDATE `opravy` SET datum='$_POST[datum]',zamestnanec='$_POST[zamestnanec]',popis_zavady='$_POST[popis_zavady]',vymenene_soucastky='$_POST[vymenene_soucastky]',cas_opravy='$_POST[cas_opravy]',naklady_na_opravu='$_POST[naklady_na_opravu]',naklady_za_cas='$_POST[naklady_za_cas]' where id='$_POST[id]' ";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
 echo '<script type="text/javascript"> alert("Oprava upravena") </script>';
    }
    else
    {
echo '<script type="text/javascript"> alert("Opravu se nepodařilo upravit") </script>';
    }
}
?>

<?php

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
    $query = "DELETE FROM opravy WHERE id = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo '<script type="text/javascript"> alert("Oprava byla úspěšně smazána") </script>';
    }else{
        echo '<script type="text/javascript"> alert("Opravu se nepodařilo smazat") </script>';
    }
    mysqli_close($connect);
}

?>

<?php


// přidávání dat do databáze

    $connect = mysqli_connect("localhost","root","","auto_servis");
    if(isset($_POST['insert'])) {
        
        $datum = $_POST['datum'];
        $zamestnanec = $_POST['zamestnanec'];
        $popis_zavady = $_POST['popis_zavady'];
        $vymenene_soucastky = $_POST['vymenene_soucastky'];
        $cas_opravy = $_POST['cas_opravy'];
        $naklady_na_opravu = $_POST['naklady_na_opravu'];
        $naklady_za_cas = $_POST['naklady_za_cas'];
        
    if(!empty($datum) && !empty($zamestnanec) && !empty($popis_zavady) && !empty($vymenene_soucastky) && !empty($cas_opravy) && !empty($naklady_na_opravu) && !empty($naklady_za_cas) )   {
    
        
        $sql = "INSERT INTO `opravy`(`datum`, `zamestnanec`, `popis_zavady`,`vymenene_soucastky`, `cas_opravy`, `naklady_na_opravu`, `naklady_za_cas`)"
                               . " VALUES ('$datum','$zamestnanec','$popis_zavady','$vymenene_soucastky','$cas_opravy','$naklady_na_opravu','$naklady_za_cas')" ;
    $qry = mysqli_query($connect, $sql);
    if($qry){
        echo '<script type="text/javascript"> alert("Oprava byla úspěšně přidána do databáze") </script>';
    }   
        
    } else {
        echo '<script type="text/javascript"> alert("Všechny políčka musí být vyplněné") </script>';
    }
     
    }
    mysqli_close($connect);
?>

<?php


     