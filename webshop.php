<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <body>
            <h1>Workshop website design</h1>
            <form method="POST">




    <h3>telefoonnummer:<input type="text" name="telefoonnummer"/><h2><br>

    <h3>
        <input type="RADIO" name = "rdaanhef" value="dhr">Dhr.
        <input type="RADIO"name = "rdaanhef" value="mvr">Mevr.
        <input type="RADIO" name = "rdaanhef" value="overig">overig</br>
    </h3>   

    <h3>voornaam:<input type="text" name="voornaam"/></h2><br>

    <h3>achternaam:<input type="text" name="achternaam"/><h2><br>
    
    <h3>woonplaats:<input type="text" name="woonplaats"/><h2><br>

    <h3>straatnaam:<input type="text" name="straatnaam"/><h2><br>

    <h3>postcode:<input type="text" name="postcode"/><h2><br>

    <h3>e-mailadres:   <input type="text" name="emailadres"/><h2><br>

    <h3><input type="RADIO" value="Di" name="rDatum"/>Dinsdag 13 Februari 2020 van 09:00u - 13:30u</h3>
    <h3><input type="RADIO" value="Wo" name="rDatum"/>Woensdag 14 Februari 2020 van 13:00u -17:30u</h3>
    

    <h3><input type="RADIO" value="Man" name="rGeslacht"/>Man
        <input type="RADIO" value="Vrouw" name="rGeslacht"/>Vrouw
        <input type="RADIO" value="Overig" name="rGeslacht"/>Overig</h3>
   
    
    <h3><input type="submit" value="Gegevens Opslaan" name= "btnOpslaan"/></h3>


    <?php 
    $host = "localhost"; // De server waar de database staat
    $dbname = "webshop"; // De naam van de database
    $user = "root"; // De gebruikersnaam voor de database (root is default bij XAMPP)
    $password = ""; // Het wachtwoord voor de gebruiker (leeg is default bij XAMPP)
    
    try{
        // Proberen verbinding te maken met de database en de verbinding opslaan in de variable con
        $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    } catch(PDOException $ex){
        // Als de verbinding maken mislukt
        echo "<hr/>";
        echo "ERROR: Verbinding mislukt: $ex";
        echo "<hr/>";
    }
    
    if(isset($_POST['btnOpslaan'])) {
    
    
        $telefoonnummer = $_POST['telefoonnummer'];
        $rdaanhef = $_POST['rdaanhef'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $woonplaats = $_POST['woonplaats'];
        $straatnaam = $_POST['straatnaam'];
        $postcode = $_POST['postcode'];
        $emailadres = $_POST['emailadres'];
        $rDatum = $_POST['rDatum'];
        $rGeslacht = $_POST['rGeslacht'];
    
        $query = "INSERT INTO aanmeldingsformulier (telefoonnummer,aanhef,Naam,Achternaam,Woonplaats,Straatnaam,postcode,emailadres,datum,geslacht)".
            "VALUES ('$telefoonnummer','$rdaanhef','$voornaam', '$achternaam','$woonplaats','$straatnaam','$postcode', '$emailadres', '$rDatum', '$rGeslacht')";
    
        $stm = $con->prepare($query);
        if($stm->execute()){
            echo "Uw informatie is toegevoegd";
        } else {
            echo "Iets is fout gegaan!";
        }
    }
    
    ?>

    <?php
    function rowCount($con, $query) {
    $stm = $con->prepare($query);
    $stm->execute();
    return $stm->rowCount();
    }
    ?>
        <h1>Overzicht Dinsdag = <?php echo rowCount($con,"SELECT * FROM aanmeldingsformulier WHERE datum = 'di'limit 20" );?></h1>
        <h1>Overzicht Woensdag = <?php echo rowCount($con,"SELECT * FROM aanmeldingsformulier WHERE datum = 'wo'limit 20");?></h1>
    

          </form>

     </body>

</html>