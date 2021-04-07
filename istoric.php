<?php 
error_reporting(0);
require 'accounts.php';
require 'contact.php';
if (!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}
if(!empty($_GET['status'])){
    echo ("<div class='alert animate' id='alert'><div id='myBar'></div><span class='closebtn' onclick="."this.parentElement.style.display='none';".">&times;</span> Mesajul t&#259u a fost trimis! Mul&#355umim pentru timpul acordat.</div></div>");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Istoric - London Underground</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="..\EWD\Imagini\favicon.png" type="image/png">
        <script src="https://kit.fontawesome.com/7b02bf280d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\nav.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\contact_alerts.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\navbar.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\istorie.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\footerframe.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\main.css">
        <script src="..\EWD\JavaScript\countdown.js"></script>
        <script src="..\EWD\JavaScript\loadingline.js"></script>
    </head>
    <body onload="move();timedText();hideAlert()">
        <div class="container">
            <img src="..\EWD\Imagini\undergroundhistorywelcome.jpg" class="img">
            <div class="line1">
                <div class="topnav">
                    <a href="# style="style="border-bottom: none;"><button class="btntopnav" onclick="document.getElementById('userwindow').style.display='block'"><i class="fas fa-user"></i><b>  <?php echo $_SESSION['lastName']; ?></b></button></a>
                    <a href="#" style="border-bottom: none;"><button class="btntopnav" onclick="document.getElementById('contactform').style.display='block'"><i class="fas fa-info"></i><b>       Contact</b></button></a>
                    <a href="http://www.tfl.gov.uk" target="_blank"><i class="fas fa-link"></i><b>     Transport for London Website<b></a>
                </div>
            </div>      
            <div id="userwindow" class="modal2">
                <div class="modal2-content2">
                    <div class="containeruser">
                        <button style="float:right;background-color:transparent;border:none;" onclick="document.getElementById('userwindow').style.display='none';"><i class="fas fa-times"></i></button>
                        <h2 style="color:black;text-align:center;">Profil</h2>
                        <p>Nume: <?php echo $_SESSION['firstName']; ?></p>
                        <p>Prenume: <?php echo $_SESSION['lastName']; ?></p>
                        <p>E-mail: <?php echo $_SESSION['email']; ?></p>
                        <a href="login.php?logout=1"><button type="button" class="cancelbtn buttonuser">Deconectare</button></a>
                    </div>
                </div>          
            </div>
            <div id="contactform" class="modal">
                <form class="modal-content animate" action="..\EWD\contact.php" method="post">
                    <div class="containeruser">
                        <button style="float:right;background-color:transparent;border:none;" onclick="document.getElementById('contactform').style.display='none';"><i class="fas fa-times"></i></button>
                        <h2 style="color:black;text-align:center;">Contact</h2>
                        <p> Nume &#351i prenume: <?php echo $_SESSION['firstName']; echo " "; echo $_SESSION['lastName'];?><br><p>
                        <p> E-mail: <?php echo $_SESSION['email']; ?></p>
                        <label for="subiect"><b style="color:black;">Subiect</label><br>
                        <input type="text" placeholder="Introduce&#355i motivul de contact" name="subiect" style="width: 100%;border:1px solid grey;color:black;top: 1px;" required></br>
                        <label for="informatii">Introduce&#355i mai multe informații</label>
                        <textarea id="informatii" rows="5" cols="70" style="width:100%;" name="textarea" required></textarea>
                        <input type="text" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'];?>" style="display:none;" readonly>
                        <h5 style="color:black;">Toate c&#226mpurile sunt obligatorii</h5>
                        <button type="submit" class="buttonsubmit buttonuser" name="contact">Trimite</button>
                    </div>
                </form>
            </div>
            <div class="line2"><hr></div>
            <div class="line3">
                <div class="navmenu nrnavmenu sticky" id="nrnavmenuid">
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\calatorii.php" class="item">C&#259l&#259torii  <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\calatorii.php#calsection1" class="item">Tichete de c&#259l&#259torie</a>
                            <a href="..\EWD\calatorii.php#calsection2" class="item">Orarul de functionare</a>
                            <a href="..\EWD\calatorii.php#calsection3" class="item">Accesibilitate</a>
                            <a href="..\EWD\calatorii.php#calsection4" class="item">Siguran&#355&#259</a>
                            <a href="..\EWD\calatorii.php#calsection1" class="item">&#206nt&#226rzieri</a>
                        </div>
                    </div>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\infrastructura.php" class="item">Infrastructur&#259  <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\infrastructura.php#infsection1" class="item">Calea ferat&#259</a>
                            <a href="..\EWD\infrastructura.php#infsection2" class="item">Linii</a>
                            <a href="..\EWD\infrastructura.php#infsection3" class="item">Extinderi și îmbunătățiri propuse</a>
                        </div>
                    </div>
                    <a href="..\EWD\istoric.php" class="active">Istoric</a>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\main.php" class="item">Acas&#259  <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\main.php#section1" class="item">Metroul de noapte</a>
                            <a href="..\EWD\main.php#section2" class="item">Modernizarea celor 4 linii </a>
                            <a href="..\EWD\main.php#section3" class="item">Imbunătăţirea trenurilor</a>
                            <a href="..\EWD\main.php#section4" class="item">Galerie</a>
                            <a href="..\EWD\main.php#section5" class="item">Videoclipuri</a>
                        </div>
                    </div>
                    <div class="navmenu-left"><a href="..\EWD\main.php"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a></div>
                </div>
                <div class="navmenu rpnavmenu1" id="rpnavmenu1id">
                    <div class="navmenu-left"><a href="..\EWD\main.php"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a></div>
                    <a href="#" style="float:right;" onclick="document.getElementById('rpnavmenu1id').style.display='none';document.getElementById('rpnavmenuid').style.display='block'"><i class="fas fa-bars"></i></a>           
                    <a href="#" style="margin-right:-35px;" onclick="document.getElementById('rpnavmenu1id').style.display='none';document.getElementById('rpnewslinks').style.display='block'"><i class="fas fa-chevron-circle-down"></i>   Navigare</a>
                </div>
                <div class="rpnavmenu" id="rpnavmenuid" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\main.php" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnavmenuid').style.display='none'"><i class="fas fa-times"></i></a>
                        </li></br></br>
                        <li><a href="..\EWD\main.php" class="underlinenav">Acas&#259</a></li>
                        <li><a href="..\EWD\istoric.php" style="text-decoration:underline;">Istoric</a></li>
                        <li><a href="..\EWD\infrastructura.php" class="underlinenav">Infrastructur&#259</a></li>
                        <li><a href="..\EWD\calatorii.php" class="underlinenav">C&#259l&#259torii</a></li>
                    </ul>
                </div>  
                <div class="rpnavmenu" id="rpnewslinks" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\main.php" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'"><i class="fas fa-arrow-circle-up"></i></a>
                        </li></br></br>
                        <li><a href="#historysection2" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Linii subterane</a></li>
                        <li><a href="#historysection3" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Linii de nivel profund</a></li>
                        <li><a href="#historysection4" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Electrificare</a></li>
                        <li><a href="#historysection5" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Compania de Căi Ferate Electrice Subterane</a></li>
                        <li><a href="history#section6" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">London Passenger Transport Board</a></li>
                        <li><a href="history#section7" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Transport for London</a></li>
                    </ul>
                </div>                        
            </div>
            <div class="line4"><p style="font-size:3vw;margin-left:5%;">Istoria metroului londonez</p></div>
            <div class="line5"><a href="#historysection0"><button class="buttonmain button10 animate">Exploreaz&#259</button></a></div>
        </div>
        <div class="newslinks" style="margin-top: 1cm;">
            <div class="newslinksheadline">
                <a href="#historysection0" class="newslinksheadline"><h2>Cronologie</h2></a>
            </div>
            <div class="newslinksheadline">
                <a href="#historysection1" class="newslinksheadline"><h2>Istorie</h2></a>
            </div>
            <a href="#historysection2" class="newslinksheadline"><h3>Linii subterane</h3></a><hr>
            <a href="#historysection3" class="newslinksheadline"><h3>Linii de nivel profund</h3></a><hr>
            <a href="#historysection4" class="newslinksheadline"><h3>Electrificare</h3></a><hr>
            <a href="#historysection5" class="newslinksheadline"><h3>Compania de Căi Ferate Electrice Subterane</h3></a><hr>
            <a href="#historysection6" class="newslinksheadline"><h3>London Passenger Transport Board</h3></a><hr>
            <a href="#historysection7" class="newslinksheadline"><h3>Transport for London</h3></a>
        </div>
        <div class="main" id="historysection0">
            <div class="timeline">
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1863</h3>
                        <p>Istoria metroului londonez începe cu Metropolitan Railway, prima cale ferată subterană pentru transport de pasageri din lume. Metropolitan Railway a început să funcționeze la 10 ianuarie 1863 între stațiile Paddington și Farringdon.</br>
                            Datorită avansului tehnic,s-a putut trece la săparea tunelelor de adâncime mare, așa numitele "tuburi".
                        </p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1880</h3>
                        <p>Linia s-a extins treptat, ajungând ca în 1880 să transporte peste 40 de milioane de călători anual. Metropolitan Railway a evoluat în ceea ce azi este cunoscută drept Metropolitan line.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1884</h3>
                        <p> În 1884 s-a încheiat și construcția "cercului" care ocolește zona centrală a Londrei, astăzi Circle Line.</p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1902</h3>
                        <p>Fiecare linie era operată de o companie diferită, ceea ce producea destule neplăceri, pasagerii fiind nevoiți să iasă la suprafață pentru a schimba o linie cu alta. Magnatul american Charles Yerkes a cumpărat majoritatea acestor companii, consolidându-le într-una singură numită Underground Electric Railways of London Company Ltd. (UERL), pe 9 aprilie 1902.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1933</h3>
                        <p>În 1933 a apărut corporația publică London Passenger Transport Board, sub tutela căreia au fost plasate companiile operatoare de trenuri de metrou.</br>
                            În timpul celui de-al doilea război mondial, stațiile de metrou au servit ca buncăre în timpul raidurilor aeriene, sau chiar ca fabrici de muniții.
                            După război, numărul călătorilor a crescut constant, ajungându-se la dese perioade de congestie. 
                        </p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1960-1999</h3>
                        <p>După război, numărul călătorilor a crescut constant, ajungându-se la dese perioade de congestie. S-au construit noi linii de adâncime, Victoria Line (prima linie automată în anii 1960) și Jubilee Line în anii 70, extinsă în 1999 (până în 1999 tenurile se opreau la Charing Cross). De asemenea, linia Piccadilly a fost extinsă până la aeroportul Heathrow în 1977.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>2000-2018</h3>
                        <p>Din anul 2000, Metroul londonez este în proprietatea și administrarea companiei publice de transport a Londrei mari, Transport for London (TfL). Liniile de metrou au fost parțial privatizate în 2003, printr-un parteneriat public-privat între TfL și două consorții de firme, Metronet respectiv Tube Lines. Parteneriatul are ca scop principal renovarea totală a șinelor, a instalațiilor de semnalizare, a stațiilor și a ramelor de tren de pe toate cele 12 linii de metrou. Investiția este enormă (de ordinul zecilor de miliarde de lire sterline), iar renovarea se preconizează să se încheie în anii 2020.</p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>2018-prezent</h3>
                        <p>Se construieste o noua linie numita Elizabeth line. Aceasta se va intinde de la Reading si Heathrow, in vest, pana la tunelurile centrale de la Shenfield pana la Abbey Wood, in est.</br>
                        Noua linie subterana va deservi undeva la 200 de milioane de pasageri pe an.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main" id="historysectionmain">
            <div class="news">
                <div class="main" id="historysection1">
                    <h2 class="newstext">Istoria metroului londonez</h2>
                    <img src="..\EWD\Imagini\history1.jpg" class="newsimage">
                </div>
                <div class="newstext">
                    <div class="main" id="historysection2">
                        <h3><b>Primii ani</b></h3>
                        <h4><b>Linii subterane</b></h4>
                        <p>Ideea unei căi ferate subterane care leagă City of London cu centrul urban a fost propusă în anii 1830, iar Metropolitan Railway a primit permisiunea de a construi o astfel de linie în 1854. Pentru a pregăti construcția, în 1855 a fost construit un tunel de încercare scurt în Kibblesworth , un oraș mic cu proprietăți geologice similare cu Londra. Acest tunel de încercare a fost utilizat timp de doi ani la dezvoltarea primului tren subteran, iar mai târziu, în 1861, a fost completat. Prima cale ferată de metrou din lume, s-a deschis în ianuarie 1863 între Paddington și Farringdon folosind cărucioare din lemn cu gaz, trase de locomotive cu aburi. A fost salutat ca un succes, transportând 38.000 de pasageri în ziua deschiderii și împrumutând trenuri de la alte căi ferate pentru a suplimenta serviciul. Metropolitan District Railway (cunoscută sub denumirea de District Railway) s-a deschis în decembrie 1868 de la South Kensington la Westminster, ca parte a unui plan pentru un „cerc interior” subteran care leagă stațiile de linie principală din Londra. Căile ferate metropolitane și districtul au completat linia Circle în 1884, construită folosind metoda tăieturii și acoperirii. Ambele căi ferate s-au extins, Districtul construind cinci ramuri spre vest, ajungând la Ealing, Hounslow, Uxbridge, Richmond și Wimbledon și Metropolitan în cele din urmă s-au extins până la Verney Junction în Buckinghamshire, la peste 50 de mile (80 km) de Baker Street și centrul din Londra.</p>
                    </div>
                    <div class="main" id="historysection3">
                        <h4>Linii de nivel profund</h4>
                        <img src="..\EWD\Imagini\history2.jpg" align="right" style="width:100%;"/>
                        <p>Pentru prima linie de tuburi adâncime, City and South London Railway, au fost săpate două tuneluri circulare cu diametrul de 10,10 m diametru între strada William King (aproape de stația Monument de astăzi) și Stockwell, pe drumurile pentru a evita nevoie de acord cu proprietarii de proprietăți la suprafață. Aceasta s-a deschis în 1890 cu locomotive electrice care transportau cărucioare cu ferestre mici opace, poreclite celule căptușite. Waterloo și City Railway s-au deschis în 1898, urmate de Central London Railway în 1900, cunoscută sub numele de „tubul twopenny”. Aceste două circulau cu trenuri electrice în tuneluri circulare, cu diametre cuprinse între 3.56 m și 1172 cm și 3,72 m, în timp ce Marea Căi Ferate de Nord și Oraș, care a fost deschisă în 1904, a fost construită pentru a lua trenuri de linie principală din Parcul Finsbury către un terminal Moorgate din oraș și avea tuneluri de 4,9 m diametru.</p>
                        <p>În timp ce locomotivele cu abur erau utilizate în metrou, au existat rapoarte de sănătate contrastante. În timp ce călătorii, din cauza căldurii și a poluării, s-au prăbușit multe cazuri de călători, ceea ce a dus la apeluri pentru curățarea aerului prin instalarea instalațiilor de grădină. Mitropolitul chiar a încurajat bărbele pentru ca personalul să acționeze ca filtru de aer. Au existat alte rapoarte care pretind rezultate benefice ale utilizării metroului, inclusiv desemnarea Great Portland Street ca „sanatoriu pentru [persoanele care suferă de astm] și plângeri bronșice”, amigdalita ar putea fi vindecată cu gaz acid și tubul Twopenny vindecat anorexie .</p>
                    </div>
                    <div class="main" id="historysection4">
                        <h4>Electrificare</h4>
                        <p>Odată cu apariția serviciilor de tuburi electrice (Waterloo și City Rail și Marea Căi Ferate Nord și Oraș), Feroviarul Electric Volks din Brighton și concurența tramvaielor electrice, companiile de metrou de pionierat au avut nevoie de modernizare. La începutul secolului al XX-lea, căile ferate district și metropolitane aveau nevoie de electrificare, iar un comitet mixt a recomandat un sistem de curent alternativ, cele două companii cooperând din cauza proprietății comune a cercului interior. Districtul, care trebuia să strângă finanțele necesare, a găsit un investitor în americanul Charles Yerkes, care a favorizat un sistem de curent continuu similar celui utilizat pe căile ferate City & South London și Central London. Calea ferată metropolitană a protestat cu privire la schimbarea planului, dar după arbitraj de către Consiliul Comerțului, sistemul DC a fost adoptat.</p>
                    </div> 
                    <div class="main" id="historysection5">
                        <h3>Compania de Căi Ferate Electrice Subterane</h3>
                        <p>În curând, Yerkes a controlat sistemul de cale ferată al districtului și a înființat Compania de căi ferate electrice subterane din Londra (UERL) în 1902 pentru a finanța și opera trei linii de tuburi, Baker Street și Waterloo Railway (Bakerloo), Charing Cross, Euston și Hampstead Railway (Hampstead ) și Great Northern, Piccadilly și Brompton Railway, (Piccadilly), care s-au deschis toate între 1906 și 1907. Când „Bakerloo” a fost numit astfel în iulie 1906, The Railway Magazine l-a numit un „titlu de jgheab” nedemn. Până în 1907, districtul și căile ferate metropolitane au electrificat secțiunile subterane ale liniilor lor.</p>
                        <p>În ianuarie 1913, UERL a achiziționat Central London Railway și City & South London Railway, precum și mulți dintre operatorii de autobuze și tramvai din Londra. Doar Metropolitan Railway, împreună cu filialele sale Great Northern & City Railway și East London Railway, și Waterloo & City Railway, deținute atunci de linia principală London și South Western Railway, au rămas în afara controlului grupului subteran.</p>
                        <img src="..\EWD\Imagini\history3.png" align="right" style="width:100%;" />
                        <p>Un acord de marketing comun între majoritatea companiilor din primii ani ai secolului XX a inclus hărți, publicitate comună, prin ticketing și semnele UNDERGROUND, care încorporează primul simbol bullseye, în afara stațiilor din centrul Londrei. La vremea respectivă, termenul Underground a fost selectat din alte trei nume propuse; „Tubul” și „Electricul” au fost ambele respinse oficial. În mod ironic, termenul Tube a fost adoptat ulterior alături de Underground. Linia Bakerloo a fost extinsă spre nord până la Queen's Park pentru a se alătura unei noi linii electrice de la Euston la Watford, dar Primul Război Mondial a întârziat construcția și trenurile au ajuns la Watford Junction în 1917. În timpul raidurilor aeriene din 1915, oamenii au folosit stațiile de metrou drept adăposturi. O extindere a liniei centrale spre vest până la Ealing a fost, de asemenea, întârziată de război și a fost finalizată în 1920. După ce garanțiile financiare susținute de guvern au fost folosite pentru extinderea rețelei, iar tunelurile din City și South London și căile ferate Hampstead au fost legate la Euston și Kennington; serviciul combinat nu a fost numit linia de Nord decât mai târziu. Metropolitan a promovat imobile în apropiere de calea ferată cu marca „Metro-land” și nouă imobile au fost construite în apropierea stațiilor de pe linie. Electrificarea s-a extins la nord de la Harrow la Rickmansworth, iar ramurile s-au deschis de la Rickmansworth la Watford în 1925 și de la Wembley Park la Stanmore în 1932. Linia Piccadilly s-a extins la nord până la Cockfosters și a preluat ramurile liniei Districtului spre Harrow (ulterior Uxbridge) și Hounslow.</p>
                    </div>
                    <div class="main" id="historysection6">
                        <h3>London Passenger Transport Board</h3>
                        <p>În 1933, majoritatea căilor ferate subterane, tramvaie și autobuze din Londra au fost contopite pentru a forma Consiliul de transport al pasagerilor din Londra, care a folosit marca London Transport. Waterloo & City Rail, aflată până atunci în proprietatea liniei principale Southern Railway, a rămas cu proprietarii existenți. În același an în care s-a constituit Consiliul de transport al pasagerilor din Londra, a apărut pentru prima dată harta schematică a tubului lui Harry Beck.</p>
                        <p>În anii următori, liniile periferice ale fostei căi ferate metropolitane s-au închis, tramvaiul Brill în 1935 și linia de la Quainton Road la Verney Junction în 1936. Programul de lucrări noi din 1935–40 a inclus extinderea liniilor centrale și nordice și linia Bakerloo pentru a prelua sucursala Stanmore a Mitropoliei. Al doilea război mondial a suspendat aceste planuri după ce linia Bakerloo a ajuns la Stanmore și linia de nord High Barnet și Mill Hill East în 1941. În urma bombardamentelor din 1940 serviciile de pasageri peste linia de Vest a Londrei au fost suspendate, lăsând centrul expozițional Olympia fără un serviciu feroviar până la Navetele de linie de district de la Curtea lui Earl au început după război. După repunerea lucrărilor la extensiile liniei centrale din estul și vestul Londrei, acestea au fost complete în 1949.</p>
                        <img src="..\EWD\Imagini\history4.jpg" class="newsimage">
                        <p>În timpul războiului, numeroase stații de metrou au fost folosite ca adăposturi de raid aerian. La 3 martie 1943, un test al sirenelor de avertizare împotriva atacului aerian, împreună cu tragerea unui nou tip de rachetă antiaeriană, au dus la o zdrobire de oameni care încercau să se adăpostească în stația de metrou Green Bethnal. Un total de 173 de persoane, inclusiv 62 de copii, au murit, ceea ce a devenit cel mai grav dezastru civil al celui de-al Doilea Război Mondial, precum și cea mai mare pierdere de viață într-un singur incident în rețeaua de metrou din Londra.</p>
                    </div>
                    <div class="main" id="historysection7">
                        <h3>Transport for London</h3>
                        <p>Transport for London (TfL) a fost creat în anul 2000 ca organism integrat responsabil pentru sistemul de transport din Londra. TfL face parte din Greater London Authority și este constituită ca o corporație legală reglementată în conformitate cu regulile de finanțe ale administrației locale. Consiliul TfL este numit de primarul Londrei, care stabilește, de asemenea, structura și nivelul tarifelor de transport public la Londra. Funcționarea cotidiană a corporației este lăsată comisarului transporturilor pentru Londra.</p>
                        <img src="..\EWD\Imagini\history5.jpg" class="newsimage">
                        <p>În cele din urmă, TfL a înlocuit London Regional Transport și a întrerupt utilizarea mărcii London Transport în favoarea propriei mărci. Transferul de responsabilitate a fost organizat, transferul controlului subteranului londonez a întârziat până în iulie 2003, când London Underground Limited a devenit o filială indirectă a TfL. Între 2000 și 2003, London Underground a fost reorganizat într-un Parteneriat public-privat unde companiile de infrastructură privată (infracos) au modernizat și au menținut calea ferată. Acest lucru a fost întreprins înainte de a trece controlul către TfL, care s-au opus acordului. O infrastructură a intrat în administrație în 2007, iar TfL a preluat responsabilitățile, TfL preluând-o pe cealaltă în 2010.</p>
                        <p>Biletele electronice sub forma cardului Oyster fără contact au fost introduse în 2003. Serviciile London Underground de pe linia East London au încetat în 2007, pentru a putea fi extinse și transformate în operațiunea London Overground, iar în decembrie 2009, linia Circle a schimbat din a servi un buclă închisă în jurul centrului Londrei către o spirală care servește și Hammersmith. Din septembrie 2014, pasagerii au putut utiliza carduri fără contact pe Tube. Utilizarea lor a crescut foarte repede și acum peste un milion de tranzacții fără contact se fac zilnic în subteran.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#History" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="framecontent" style="top:50px;">
            <p>
                &#169 2020 Marian-Milovan Arsul</br>
                E-mail: marian.arsul00@e-uvt.ro</br>
                Site Web realizat pentru tema de la Elemente de Web Design</br>
                Facultatea de Matematic&#259 si Informatic&#259, an 1, semestrul 2, grupa 2, subgrupa 2</br>
                Nu de&#355in informa&#355iile imaginile sau videoclipurile publicate pe acest site &#351i nu garantez autenticitatea acestora.
            </p>
        </div>
    </body>
</html>