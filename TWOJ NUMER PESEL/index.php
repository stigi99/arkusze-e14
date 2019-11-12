<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Sklep papierniczy </title>
<link rel="stylesheet" href="styl.css">
</head>
<body> 
<main id = "container">
    <header id ="header">
        <h1>W naszym sklepie internetowym kupisz najtaniej </h1>
    </header>
    <section id="left">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul id="lista">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "sklep");
            $sql = "Select nazwa from towary where promocja = 1";
            $result = mysqli_query($conn, $sql );
            while($row = mysqli_fetch_assoc($result)){
                echo "<li>".$row["nazwa"]."</li>";
            }
            mysqli_close($conn);
            ?>
        </ul>
    </section>
    <section id="middle">
        <h3>Cena wybranego artykułu w promocji</h3>
        <form id="formularz" method="POST">
            <select name="przedmiot">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisanki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <input type="submit" value="WYBIERZ" name="przycisk">
        </form>
        <?php
         
        if (isset($_POST["przycisk"])){
            $conn = mysqli_connect("localhost","root","","sklep");
            $result = mysqli_query($conn,"select cena from towary where nazwa ='".$_POST["przedmiot"]."'");
            while($row = mysqli_fetch_assoc($result)){
                echo round($row["cena"]*0.85 , 2);
            
            }
            mysqli_close($conn);
        }
        ?>
        
    </section>
    <section id = "right">
        <h3>Kontakt</h3>
        <p>telefon:123123123</p><p> e-mail:<a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja2.png" alt="promocja">
    </section>
    <footer id = "footer">
        <h4>Autor strony Twój numer PESEL</h4>
    </footer>




</main>

</body>
</html>
