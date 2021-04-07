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
        <title>C&#259l&#259torii - London Underground</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="..\EWD\Imagini\favicon.png" type="image/png">
        <script src="https://kit.fontawesome.com/7b02bf280d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\nav.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\contact_alerts.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\navbar.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\main.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\footerframe.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\travel.css">
        <script src="..\EWD\JavaScript\countdown.js"></script>
        <script src="..\EWD\JavaScript\loadingline.js"></script>
    </head>
    <body onload="move();timedText();hideAlert()">
        <div class="container">
            <img src="..\EWD\Imagini\calwelcome.jpg" class="img">
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
                        <h5 style="color:black;">Toate c&#226mpurile sunt obligatorii</h5>
                        <input type="text" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'];?>" style="display:none;" readonly>
                        <button type="submit" class="buttonsubmit buttonuser" name="contact">Trimite</button>
                    </div>
                </form>
            </div>
            <div class="line2"><hr></div>
            <div class="line3">
                <div class="navmenu nrnavmenu sticky" id="nrnavmenuid">
                    <a href="..\EWD\calatorii.php" class="active">C&#259l&#259torii</a>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\infrastructura.php" class="item">Infrastructur&#259  <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\infrastructura.php#infsection1" class="item">Calea ferat&#259</a>
                            <a href="..\EWD\infrastructura.php#infsection2" class="item">Linii</a>
                            <a href="..\EWD\infrastructura.php#infsection3" class="item">Extinderi și îmbunătățiri propuse</a>
                        </div>
                    </div>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\istoric.php" class="item">Istoric <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\istoric.php#historysection0" class="item">Cronologie</a>
                            <a href="..\EWD\istoric.php#historysection2" class="item">Linii subterane</a>
                            <a href="..\EWD\istoric.php#historysection3" class="item">Linii de nivel profund</a>
                            <a href="..\EWD\istoric.php#historysection4" class="item">Electrificare</a>
                            <a href="..\EWD\istoric.php#historysection5" class="item">Compania de Căi Ferate Electrice Subterane</a>
                            <a href="..\EWD\istoric.php#historysection6" class="item">London Passenger Transport Board</a>
                            <a href="..\EWD\istoric.php#historysection7" class="item">Transport for London</a>
                        </div>
                    </div>
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
                        <li><a href="..\EWD\istoric.php" class="underlinenav">Istoric</a></li>
                        <li><a href="..\EWD\infrastructura.php" class="underlinenav">Infrastructur&#259</a></li>
                        <li><a href="..\EWD\calatorii.php" style="text-decoration:underline;">C&#259l&#259torii</a></li>
                    </ul>
                </div>  
                <div class="rpnavmenu" id="rpnewslinks" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\main.php" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'"><i class="fas fa-arrow-circle-up"></i></a>
                        </li></br></br>
                        <li><a href="#calsection1" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Tichete de c&#259l&#259torie</a></li>
                        <li><a href="#calsection2" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Orarul de func&#355ionare</a></li>
                        <li><a href="#calsection3" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Accesibilitate</a></li>
                        <li><a href="#calsection4" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Siguran&#355&#259</a></li>
                        <li><a href="#calsection5" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Întârzieri</a></li>
                    </ul>
                </div>                
            </div>
            <div class="line4"><p style="font-size:3vw;margin-left:100px;">C&#259l&#259toria cu metroul</p></div>
            <div class="line5"><a href="#calsectionmain"><button class="buttonmain button10 animate">Exploreaz&#259</button></a></div>
        </div>
        <div class="newslinks" style="margin-top:1cm;">
            <div class="newslinksheadline">
                <a href="#calsectionmain" class="newslinksheadline"><h2>C&#259l&#259torii</h2></a>
            </div>
            <a href="#calsection1" class="newslinksheadline"><h3>Tichete de c&#259l&#259torie</h3></a><hr>
            <a href="#calsection2" class="newslinksheadline"><h3>Orarul de func&#355ionare</h3></a><hr>
            <a href="#calsection3" class="newslinksheadline"><h3>Accesibilitate</h3></a><hr>
            <a href="#calsection4" class="newslinksheadline"><h3>Siguran&#355&#259</h3></a><hr>
            <a href="#calsection5" class="newslinksheadline"><h3>Întârzieri</h3></a>
        </div>
        <div class="main" id="calsectionmain">
            <div class="main" id="calsection1">
                <div class="news">
                    <h2 class="newstext">Tichete de c&#259l&#259torie</h2>
                    <img src="..\EWD\Imagini\cal1.jpg" class="newsimage">
                    <div class="newstext">
                        <p>Underground a primit 2.669 miliarde lire sterline în 2016/17 și utilizează sistemul de tarif Zonal din Londra pentru a calcula tarifele. Există nouă zone, zona 1 fiind zona centrală, care include bucla liniei Circle cu câteva stații până la la sud de râul Thames. Singurele stații de metrou londoneze din zonele 7 - 9 sunt pe linia metropolitană dincolo de Moor Park, în afara regiunii londoneze. Unele stații sunt în două zone și se aplică cel mai ieftin tarif. Biletele de hârtie, cardurile Oyster contactless, cardurile de debit sau de credit contactless și smartphone-urile și ceasurile Apple Pay și Google Pay pot fi utilizate pentru călătorii. Biletele simple și retur sunt disponibile în orice format, dar cărțile de călătorie (bilete de sezon) mai mult de o zi sunt disponibile doar pe cardurile Oyster.</p>
                        <p>TfL a introdus cardul Oyster în 2003; aceasta este o cartelă inteligentă cu plată în avans cu un cip RFID fără contact încorporat. Tarifele pentru călătorii unice sunt mai ieftine decât biletele de hârtie, iar o plafonă zilnică limitează costul total într-o zi la prețul unui card de călătorie de zi. Cartea Oyster trebuie să fie „atinsă” la începutul și sfârșitul unei călătorii, altfel este considerată „incompletă” și se percepe tariful maxim. În martie 2012, costul acestui an pentru călătorii a fost de 66,5 milioane de lire sterline.</p>
                        <p>În 2014, TfL a devenit primul furnizor de transport public din lume care a acceptat plata de pe cardurile bancare fără contact. Underground a început pentru prima dată să accepte carduri de debit și credit fără contact în septembrie 2014. Aceasta a fost urmată de adoptarea Apple Pay în 2015 și Google Pay în 2016, permițând plata folosind un telefon sau smartwatch activat fără contact. Peste 500 de milioane de călătorii au avut loc folosind contactless, iar TfL a devenit unul dintre cei mai mari comercianți fără contact din Europa, cu aproximativ 1 din 10 tranzacții fără contact în Marea Britanie care au loc pe toată rețeaua TfL. Această tehnologie, dezvoltată în interior de TfL, a fost licențiată în alte orașe importante precum New York City și Boston.</p>
                        <p>Consiliile de la Londra operează un sistem de tarife concesionare pentru rezidenții cu handicap sau care îndeplinesc anumite criterii de vârstă. Locuitorii născuți înainte de 1951 au fost eligibili după a 60-a aniversare, în timp ce cei născuți în 1955 vor trebui să aștepte până la 66 de ani. Numit „Pass Freedom”, acesta permite deplasarea gratuită pe rutele operate de TfL și este valabil pe anumite căi ferate naționale servicii în Londra la sfârșit de săptămână și după ora 09:30, de luni până vineri. Din 2010, Freedom Pass a inclus o fotografie a titularului încorporat; durează cinci ani între reînnoiri.</p>
                        <p>În afară de tarifele automate și cu personal la stații, Underground funcționează și pe un sistem de dovadă a plății. Sistemul este patrulat atât de inspectori uniforme, cât și de uniforme, cu cititori de cărți Oyster. Pasagerii care călătoresc fără bilet valabil trebuie să plătească o taxă de penalizare de 80 de lire sterline (40 de lire sterline în cazul în care sunt plătite în 21 de zile) și pot fi urmăriți penal pentru evaziune în temeiul Regulamentului Legii Căilor Ferate 1889 și al Transportului pentru Reglementările din Londra.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Ticketing" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection2">
                <div class="news" style="margin-top:1cm;">
                    <h1 class="newstext">Orarul de func&#355ionare</h1>
                    <div class="newstext">
                        <p>Metroul se închide peste noapte în cursul săptămânii, dar din 2016, liniile Central, Jubilee, Northern, Piccadilly și Victoria, precum și o secțiune scurtă a Overground-ului din Londra au funcționat toată noaptea, vineri și sâmbătă. Primele trenuri circulă de la aproximativ 05:00, iar ultimele trenuri până imediat după ora 01:00, cu orele de plecare ulterioare duminică dimineața. Închiderile nocturne sunt utilizate pentru întreținere, dar unele linii rămân deschise de Revelion și funcționează mai multe ore în timpul unor evenimente publice majore, cum ar fi Jocurile Olimpice de la Londra din 2012. Unele linii sunt închise ocazional pentru lucrări de inginerie programate la sfârșit de săptămână.</p>
                        <p>Metroul are un serviciu limitat în ajunul Crăciunului, cu unele linii care se închid mai devreme și nu funcționează în ziua de Crăciun. Începând cu 2010, o dispută între London Underground și sindicatele cu privire la plata vacanțelor a dus la un serviciu limitat în ziua  na&#355ionala a boxului.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Hours_of_operation" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection3">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">Acces pentru persoanele cu handicap</h2>
                    <img src="..\EWD\Imagini\cal2.jpg" class="newsimage">
                    <div class="newstext">
                        <p>Accesibilitatea pentru persoanele cu mobilitate limitată nu a fost luată în considerare atunci când a fost construită cea mai mare parte a sistemului și, înainte de 1993, reglementările privind incendiile interziceau scaunele cu rotile pe metrou. Stațiile de extindere a liniei Jubilee, deschise în 1999, au fost primele stații ale sistemului proiectate cu accesibilitate în minte, dar modernizarea funcțiilor de accesibilitate la stațiile mai vechi este o investiție majoră care este planificată să dureze peste douăzeci de ani. Un raport al Adunării de la Londra din 2010 a concluzionat că peste 10% dintre persoanele din Londra aveau mobilitate redusă și, cu o populație îmbătrânită, numărul va crește în viitor.</p>
                        <p>Harta standard a metrourilor de emisiune indică stațiile care sunt fără pas de la stradă la platforme. De asemenea, poate exista un pas de la platformă la tren până la 300 cm (12 cm) și un decalaj între tren și platformele curbe, iar aceste distanțe sunt marcate pe hartă. Accesul de la platformă la tren în unele stații poate fi asistat folosind o ramă de îmbarcare operate de personal, iar o secțiune a fost ridicată pe unele platforme pentru a reduce pasul.</p>
                        <p>Începând cu februarie 2020, există 79 de stații cu acces fără trecere de la platformă la tren și există planuri de a oferi acces fără trepte la alte 19 stații până în 2024. Până în 2016, o treime dintre stații aveau cocoașe de platformă care reduc pasul din platforma pentru a se antrena. [Trenurile noi, cum ar fi cele introduse în rețeaua de sub-suprafață, au acces și spațiu pentru scaune cu rotile, sisteme îmbunătățite de informații audio și vizuale și controale de ușă accesibile.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Accessibility" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection4">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">Siguran&#355&#259 &#351i responsabilitate</h2>
                    <div class="newstext">
                        <p>Metroul din Londra este autorizat să opereze trenuri de către Oficiul Reglementării Feroviare. La 19 martie 2013 au trecut 310 zile de la ultimul incident major, când un pasager a murit după ce a căzut pe pista. Începând cu 2015, au existat nouă ani consecutivi în care nu s-au produs victime ale angajaților. O unitate specială de pregătire a personalului a fost deschisă în stația de metrou West Ashfield din Ashley House din TFL, West Kensington, în 2010, cu un cost de 800.000 lire sterline. Între timp, primarul Londrei Boris Johnson a decis ca acesta să fie demolat împreună cu Centrul Expozițional Earls Court, ca parte a celei mai mari scheme de regenerare din Europa.</p>
                        <p>În noiembrie 2011, s-a raportat că 80 de persoane au murit prin sinucidere în anul precedent pe metroul Londrei, peste 46 în 2000. Majoritatea platformelor de la stațiile de metrou adânc au gropi, adesea denumite „gropi de sinucidere”, sub piste. Acestea au fost construite în 1926 pentru a ajuta scurgerea apei de pe platforme, dar reduc la jumătate și probabilitatea unei fatalități atunci când un pasager cade sau sare în fața unui tren.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Safety" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection5">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">Întârzieri și supraaglomerare</h2>
                    <img src="..\EWD\Imagini\cal3.jpg" class="newsimage">
                    <div class="newstext">
                        <p>În orele de vârf, stațiile pot ajunge atât de aglomerate încât trebuie să fie închise. Este posibil ca pasagerii să nu urce pe primul tren, iar majoritatea pasagerilor nu găsesc un loc în trenurile lor, unele trenuri având mai mult de patru pasageri la fiecare metru pătrat. Când li se cere, pasagerii raportează supraaglomerarea ca aspect al rețelei de care sunt cel mai puțin satisfăcuți, iar supraaglomerarea a fost legată de o productivitate slabă și de o sănătate cardiacă potențială precară. Creșterile capacității au fost depășite de creșterea cererii, iar supraaglomerația maximă a crescut cu 16% din 2004/5.</p>
                        <p>Față de 2003/4, fiabilitatea rețelei a crescut în 2010/11, iar orele pierdute ale clienților s-au redus de la 54 de milioane la 40 de milioane. Pasagerii au dreptul la o rambursare în cazul în care călătoria lor este întârziată cu 15 minute sau mai mult din cauza circumstanțelor aflate sub controlul TfL, iar în 2010, 330.000 de pasageri din un potențial 11 milioane de pasageri cu tubul au solicitat compensații pentru întârzieri. Aplicațiile și serviciile de telefoane mobile au fost dezvoltate pentru a ajuta pasagerii să solicite restituirea mai eficientă.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Delays_and_overcrowding" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
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
        </div>
    </body>
</html>