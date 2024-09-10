<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   $conn = mysqli_connect("localhost", "root", "", "sklep");

   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
   echo "Connected successfully <Br>";

//    $query = mysqli_query($conn, "SELECT * FROM dostawcy;");
//    while($row = mysqli_fetch_array($query)){
//     echo $row['nazwa'];
//     echo "<br>";
//    }
    ?>
    <div>
        <p>Taniej o 30%</p>
        <?php
        $discount = mysqli_query($conn, "SELECT `nazwa` FROM `towary` WHERE `promocja`=1;");
        while($row = mysqli_fetch_array($discount)){
            echo $row['nazwa'];
            echo "<br>";
        }
        ?>
    </div>
<br>
    <div>
        <form action="" method="post">
        <select name="options" id="options">
            <option value="1">Zeszyt 60 kartek</option>
            <option value="2">Zeszyt 32 kartk</option>
            <option value="3">Cyrkiel</option>
            <option value="4">Linijka 30 cm</option>
            <option value="5">Ekierka</option>
            <option value="6">Linijka 50 cm</option>
            <option value="7">Gumka do mazania</option>
            <option value="8">Cienkopis</option>
            <option value="9">Pisaki 60 szt.</option>
            <option value="10">Markery 4 szt.</option>
        </select>
        <button type="submit">Sprawdź</button>
        </form>

        <?php
        if (isset($_POST['options'])) {
            $option = $_POST['options'];
            
            
        } 

        $regular = mysqli_query($conn, "SELECT `cena` FROM `towary` WHERE `id`=".$option);
            while($row = mysqli_fetch_array($regular)){
                echo "Cena regularna ".$row['cena'];
                echo"<br>";
                echo "Cena w promocji 30% ".$row['cena']*0.7;
                
            }
        ?>
        <script>
           const options = document.querySelectorAll('select');
            console.log(options[0].value)
        </script>
    </div>
</body>
</html>