
<html>
<head>
<meta charset="utf-8">
<title> Sklep papierniczy </title>
<link rel="stylesheet" href="styl.css">
</head>
<body> 
<div id = "container">
    <header id ="header">
        <h1>W naszym sklepie internetowym kupisz najtaniej </h1>
    </header>
    <div id="left">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul id="lista">
            <?php
            $conn = new mysqli("localhost","root", "", "sklep");
            $result = $conn->query("Select nazwa from towary where promocja = 1");
            while($row = $result->fetch_assoc()){
                echo "<li>".$row["nazwa"]."</li>";
            }
            $result->close();
            $conn->close();
            ?>
        </ul>
    </div>
    <div id="middle">
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
         $conn = new mysqli("localhost","root", "", "sklep");
        if (isset($_POST["przycisk"])){
            $result = $conn->query("select cena from towary where nazwa ='".$_POST["przedmiot"]."'");
            while($row = $result->fetch_assoc()){
                echo round($row["cena"]*0.85 , 2);
            $conn->close();
            }
        }
        ?>
        
    </div>
    <div id = "right">
        <h3>Kontakt</h3>
        <p>telefon:123123123</p><p> e-mail:<a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja2.png" alt="promocja">
    </div>
    <footer id = "footer">
        <h4>Autor strony Twój numer PESEL</h4>
    </footer>




</div>

</body>
</html>