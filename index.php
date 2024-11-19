<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <aside>
            <h3>Ryby zamieszkujące rzeki</h3>
        <?php
            echo '<ol>';

            $polaczenie = mysqli_connect('localhost','root','','ryby');
            
            $sql = 'SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM `ryby` JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;';
            
            $wynik = mysqli_query($polaczenie, $sql);
            
            while($wiersz = mysqli_fetch_assoc($wynik)){
                echo '<li>' . $wiersz['nazwa'] . ',' . $wiersz['akwen'] . ',' . $wiersz['wojewodztwo'] . '</li>';
            }
            
            echo '</ol>';
            
            mysqli_close($polaczenie);
        ?>
    </aside>
    <nav>
    <img src="ryba1.jpg" alt="Sum"><br>
    <a href="kwerendy.txt">Pobierz kwerendy</a>
    </nav>
    <main>
        <h3>Ryby drapieżne naszych wód</h3>
        
        <table>
            <tr>
                <th>Lp.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
        <?php
            $polaczenie2 = mysqli_connect('localhost','root','','ryby');

            $sql2 = 'SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE styl_zycia = 1;';
                     
            $wynik2 = mysqli_query($polaczenie2, $sql2);
                     
            while($wiersz2 = mysqli_fetch_assoc($wynik2)){
                 echo '<tr><td>' . $wiersz2['id'] . '</td><td>' . $wiersz2['nazwa'] . '</td><td>' . $wiersz2['wystepowanie'] . '</td></tr>';
            }

            mysqli_close($polaczenie2);   
        ?>
        </table>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>