<?php 
error_reporting(0);
require 'accounts.php';
require 'contact.php';
if(!empty($_GET['status'])){
    echo ("<div class='alert animate' id='alert'><div id='myBar'></div><span class='closebtn' onclick="."this.parentElement.style.display='none';".">&times;</span> Mesajul t&#259u a fost trimis! Mul&#355umim pentru timpul acordat.</div></div>");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Acas&#259 - London Underground</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="..\EWD\Imagini\favicon.png" type="image/png">
        <script src="https://kit.fontawesome.com/7b02bf280d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\nav.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\contact_alerts.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\navbar.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\main.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\footerframe.css">
        <script src="..\EWD\JavaScript\countdown.js"></script>
        <script src="..\EWD\JavaScript\loadingline.js"></script>
    </head>
    <body onload="move();timedText();hideAlert()">
        <div class="container">
            <img src="..\EWD\Imagini\welcome.gif" class="img">
            <div class="line1">
                <div class="topnav">
                    <a href="#" style="border-bottom: none;"><button class="btntopnav" onclick="document.getElementById('userwindow').style.display='block'"><i class="fas fa-user"></i><b>  <?php echo $_SESSION['lastName']; ?></b></button></a>
                    <a href="#" style="border-bottom: none;"><button class="btntopnav" onclick="document.getElementById('contactform').style.display='block'"><i class="fas fa-info"></i><b> Contact</b></button></a>
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
                    <div class="containeruser" style="margin-top:0px;">
                        <button style="float:right;background-color:transparent;border:none;" onclick="document.getElementById('contactform').style.display='none';"><i class="fas fa-times"></i></button>
                        <h2 style="color:black;text-align:center;">Contact</h2>
                        <p> Nume &#351i prenume: <?php echo $_SESSION['firstName']; echo " "; echo $_SESSION['lastName'];?><br><p>
                        <p> E-mail: <?php echo $_SESSION['email']; ?></p>
                        <label for="subiect"><b style="color:black;">Subiect</label><br>
                        <input type="text" placeholder="Introduce&#355i motivul de contact" name="subiect" style="width: 100%;border:1px solid grey;color:black;top: 1px;" required></br>
                        <label for="informatii">Introduce&#355i mai multe informa??ii</label>
                        <textarea id="informatii" rows="5" cols="70" style="width:100%;" name="textarea" required></textarea>
                        <input type="text" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'];?>" style="display:none;" readonly>
                        <h5 style="color:black;">Toate c&#226mpurile sunt obligatorii</h5>
                        <button type="submit" class="buttonsubmit buttonuser" name="contact">Trimite</button>
                    </div>
                </form>
            </div>
            <div class="line2"><hr></div>
            <div class="line3">
                <div class="navmenu nrnavmenu" id="nrnavmenuid">
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
                            <a href="..\EWD\infrastructura.php#infsection3" class="item">Extinderi ??i ??mbun??t????iri propuse</a>
                        </div>
                    </div>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\istoric.php" class="item">Istoric <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\istoric.php#historysection0" class="item">Cronologie</a>
                            <a href="..\EWD\istoric.php#historysection2" class="item">Linii subterane</a>
                            <a href="..\EWD\istoric.php#historysection3" class="item">Linii de nivel profund</a>
                            <a href="..\EWD\istoric.php#historysection4" class="item">Electrificare</a>
                            <a href="..\EWD\istoric.php#historysection5" class="item">Compania de C??i Ferate Electrice Subterane</a>
                            <a href="..\EWD\istoric.php#historysection6" class="item">London Passenger Transport Board</a>
                            <a href="..\EWD\istoric.php#historysection7" class="item">Transport for London</a>
                        </div>
                    </div>
                    <a href="..\EWD\index.php" class="active">Acas&#259</a>
                    <div class="navmenu-left"><a href="..\EWD\index.php"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a></div>
                </div>
                <div class="navmenu rpnavmenu1" id="rpnavmenu1id">
                    <div class="navmenu-left"><a href="..\EWD\index.phpp"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a></div>
                    <a href="#" style="float:right;" onclick="document.getElementById('rpnavmenu1id').style.display='none';document.getElementById('rpnavmenuid').style.display='block'"><i class="fas fa-bars"></i></a>
                    <a href="#" style="margin-right:-35px;" onclick="document.getElementById('rpnavmenu1id').style.display='none';document.getElementById('rpnewslinks').style.display='block'"><i class="fas fa-chevron-circle-down"></i>   Navigare</a>           
                </div>
                <div class="rpnavmenu" id="rpnavmenuid" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\index.phpp" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnavmenuid').style.display='none'"><i class="fas fa-times"></i></a>
                        </li></br></br>
                        <li><a href="..\EWD\index.php" style="text-decoration:underline;">Acas&#259</a></li>
                        <li><a href="..\EWD\istoric.php" class="underlinenav">Istoric</a></li>
                        <li><a href="..\EWD\infrastructura.php" class="underlinenav">Infrastructur&#259</a></li>
                        <li><a href="..\EWD\calatorii.php" class="underlinenav">C&#259l&#259torii</a></li>
                    </ul>
                </div>
                <div class="rpnavmenu" id="rpnewslinks" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\index.php" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'"><i class="fas fa-arrow-circle-up"></i></a>
                        </li></br></br>
                        <li><a href="#section1" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Metroul de noapte</a></li>
                        <li><a href="#section2" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Modernizarea celor 4 linii</a></li>
                        <li><a href="#section3" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Imbun??t????irea trenurilor</a></li>
                        <li><a href="#section4" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Galerie</a></li>
                        <li><a href="#section5" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Videoclipuri</a></li>
                    </ul>
                </div>                     
            </div>
            <div class="line4"><p style="font-size:3vw;">Descoper&#259 metroul din Londra</p></div>
            <div class="line5"><a href="#section0"><button class="buttonmain button10 animate">Exploreaz&#259</button></a></div>
        </div>
        <div class="newslinks" style="margin-top: 2cm;" id="newslinks">
            <div class="newslinksheadline">
                <a href="#section0" class="newslinksheadline"><h2>Navigare</h2></a>
            </div>
            <div class="newslinksheadline">
                <a href="#section1" class="newslinksheadline"><h2>&#350tiri</h2></a>
            </div>
            <a href="#section1" class="newslinksheadline"><h3>Metroul de noapte</h3></a><hr>
            <a href="#section2" class="newslinksheadline"><h3>Modernizarea celor 4 linii</h3></a><hr>
            <a href="#section3" class="newslinksheadline"><h3>Imbun??t????irea trenurilor</h3></a>
            <div class="newslinksheadline">
                <a href="#section4" class="newslinksheadline"><h2>Galerie</h2></a>
            </div>
            <div class="newslinksheadline">
                <a href="#section5" class="newslinksheadline"><h2>Videoclipuri</h2></a>
            </div>
        </div>
        <div class="main" id="section0">
            <a href="..\EWD\istoric.php">
                <div class="content3">
                    <img src="..\EWD\Imagini\undergroundhistorywelcome.jpg" class="content3image">
                    <h3>Istoric</h3>
                </div>
            </a>
            <a href="..\EWD\infrastructura.php">
                <div class="content3" style="left:27%;">
                    <img src="..\EWD\Imagini\inf-resize.jpg" class="content3image">
                    <h3>Infrastructur&#259</h3>
                </div>
            </a>
            <a href="..\EWD\calatorii.php">
                <div class="content3" style="left:50%;">
                    <img src="..\EWD\Imagini\calatorii.jpg" class="content3image">
                    <h3>C&#259l&#259torii</h3>
                </div>
            </a>
        </div>
        <div class="main" id="section1">
            <div class="news">
                <h2 class="newstext">Metroul de noapte</h2>
                <img src="..\EWD\Imagini\nighttube.jpg" class="newsimage">
                <div class="newstext">
                    <p>
                        The Night Tube ??i London Overground Night Service, denumit adesea pur ??i simplu Night Tube este un model de serviciu ??n sistemele London Underground ??i London Overground, care ofer?? servicii de noapte c??l??torilor noaptea de vineri ??i s??mb??t?? ??n Central, Jubilee, Nord, Piccadilly , linii Victoria ??i o scurt?? sec??iune a liniei East London din Londra</br>
                        De la ??nfiin??area metroului londonez, practicarea serviciilor pe timp de noapte a fost dificil??, ??n special din cauza factorilor de zgomot pe timp de noapte ??i a lucr??rilor de ??ntre??inere ??n curs de desf????urare care apar de obicei ??n timpul nop??ii. Moderniz??ri ??n mas?? generale la re??eaua de metrou a Londrei de la sf??r??itul anilor 1990 ??ncoace, ??mpreun?? cu ??mbun??t????iri mari ale infrastructurii sta??iilor ??i semnaliz??rii, plus cl??direa Crossrail (cu probabilitatea viitoare a Crossrail 2), care va avea sec??iuni care vor intra ??n subteran pentru a se conecta cu principalul sistem de metrou din Londra, a f??cut posibil?? introducerea unui serviciu de transport pe timp de noapte limitat.</br>
                        Liniile Waterloo & City ??i sub-suprafe??e nu au fost ??nc?? modernizate ??i semnalizate, dar este de a??teptat ca, atunci c??nd aceste lucr??ri s?? fie finalizate pe aceste linii, vor avea ??i servicii 24 de ore. Alte servicii, cum ar fi London Overground ??i Docklands Light Railway vor avea servicii peste noapte ??n viitorul apropiat pentru a se conecta cu serviciile de metrou de noapte. Pe liniile sub-suprafe??e, serviciile de tuburi de noapte sunt planificate s?? fie introduse pe Metropolitan ??ntre Aldgate ??i Harrow-on-the-Hill, pe linia de district dintre Barking ??i Wimbledon ??i pe linia Hammersmith & City ??ntre Hammersmith ??i Tower Hill.</br>
                        TfL a anun??at la jum??tatea lui 2014 introducerea Tubeului de noapte. Planurile ini??iale erau pentru un serviciu de vineri ??i s??mb??t?? seara pe un num??r limitat de linii, cu, ??n medie, un tren la fiecare 10 minute sau mai pu??in, continu??nd ??ncep??nd cu aproximativ miezul nop??ii, c??nd serviciile de tren aproape de aproximativ 5 diminea??a ??i p??n?? la serviciul obi??nuit de diminea????.</br>
                        Serviciul planificat a fost pe ansamblul liniilor Jubilee ??i Victoria. ??n plus, au fost planificate servicii pe linia central?? dintre Ealing Broadway ??i Hainault sau Loughton, linia nordic?? ??ntre Morden ??i Edgware sau High Barnet via Charing Cross ??i linia Piccadilly ??ntre Cockfosters ??i Heathrow Terminal 5. Serviciul a fost programat s?? se lanseze pe 11/12 septembrie 2015, cu perspectiva de extindere pe alte linii ??n anii urm??tori. Cu toate acestea, din cauza ac??iunilor de atac, startul Tubeului Nocturn a fost am??nat.</br>
                    </p>
                    <a href="https://en.wikipedia.org/wiki/Night_Tube" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                </div>
            </div>
        </div>
        <div class="main" id="section2">
            <div class="news">
                <h2 class="newstext">Modernizarea celor 4 linii</h2>
                <iframe width="100%" height="615" src="https://www.youtube-nocookie.com/embed/jhsFWSO4mA8?controls=0" frameborder="0" style="border-radius:10px;"></iframe>
                <div class="newstext">
                    <p>
                        Transform??m liniile Circle, District, Hammersmith & City ??i Metropolitan. C??nd lucrarea este finalizat?? ??n 2023, capacitatea crescut?? ??i fiabilitatea sporit?? vor face c??l??toriile mai rapide ??i mai confortabile.</br>
                        Deoarece aceste linii ??mpart o mul??ime de trasee ??i infrastructur??, ele sunt modernizate ??n cadrul unui singur proiect combinat ??i integrat, Four Lines Modernization (4LM).</br>
                        Cele patru linii se num??r?? printre unele dintre cele mai vechi sec??iuni ale re??elei de metrou, cu p??r??i care dateaz?? din 1863. ??mpreun?? constituie 40% din re??eaua de metrou, cu aproximativ un milion de c??l??tori ??n fiecare zi
                    </p>
                    <h3>Noi trenuri</h3>
                    <p>
                        O flot?? de 192 de trenuri moderne, cu aer condi??ionat, de stocare ??n S, circul?? pe liniile Circle, Hammersmith & City, District ??i Metropolitan.</br>
                        Aceste trenuri sunt mai lungi ??i mai spa??ioase dec??t trenurile vechi pe care le-au ??nlocuit. U??ile trenului sunt, de asemenea, mai mari, cre??nd spa??iu suplimentar pentru ca mai mul??i oameni s?? intre ??i s?? plece la sta??ii. Acest lucru gr??be??te c??l??toriile.</br>
                        Trenurile au, de asemenea, informa??ii audio ??i vizuale ??mbun??t????ite, spa??ii dedicate scaunelor cu rotile ??i interioare contrastante.</br>
                    </p>
                    <h3>Noi c&#259i ferate si canalizare</h3>
                    <p>
                        ??nlocuind traseele ??i punctele vechi ??i uzate, c??l??toriile tale vor fi mai lini??tite ??i mai u??oare. ??mpreun?? cu noile sisteme de drenaj, vor fi mai fiabile pe vreme rea.</br>
                        O drenare mai bun?? ??nseamn?? c?? pista este mai pu??in probabil?? s?? inunde, reduc??nd ??nt??rzierile ??n c??l??torii din cauza defec??iunilor semnalului, precum ??i mai pu??ine ??nchideri pentru lucr??rile de ??ntre??inere ??i repara??ii.</br>
                    </p>
                    <h3>Un nou sistem de semnalizare</h3>
                    <p>
                        Lucr??rile pentru instalarea unui nou sistem de semnalizare ??i control au ??nceput ??n vara anului 2016. Acest lucru va permite ??n cele din urm?? conducerea automat?? a trenurilor, cu un operator de tren ??n cabin?? s?? deschid?? ??i s?? ??nchid?? u??ile. Operatorul de tren va fi responsabil de gestionarea informa??iilor ??i siguran??ei clien??ilor.</br>
                        Tehnologia similar?? introdus?? ??n ultimii ani pe liniile Jubilee ??i Nord a ??mbun??t????it performan??a. Noul sistem de semnalizare permite trenurilor s?? fie mai str??nse ??mpreun??, ceea ce ??nseamn?? un serviciu mai frecvent ??i timpi de a??teptare mai mici, permi????nd transportul mai multor persoane. Aceast?? nou?? tehnologie ne va permite s?? reducem ??nt??rzierile ??i s?? ??mbun??t????im fiabilitatea.</br>
                        Programul ne va permite s?? opereaz?? 32 de trenuri pe or??, cu o cre??tere de 33% a capacit????ii de maxim?? or??. Lucr??rile de instalare vor necesita unele ??nchideri de linie.</br>
                    </p>
                    <h3>Beneficii</h3>
                    <ul style="background-color: transparent; list-style-type: disc;">
                        <li>O nou?? flot?? de trenuri cu aer condi??ionat, cu interioare mai luminoase ??i mai spa??ioase, podele joase ??i spa??ii dedicate pentru utilizatorii de scaune cu rotile, CCTV ??i alte func??ii ??mbun??t????ite</li>
                        <li>Spa??iu pentru mai mul??i clien??i</li>
                        <li>C??l??torii mai rapide ??i timpii de a??teptare reduse</li>
                        <li>Mai pu??ine ??nt??rzieri ca echipamente sigure, dar ??nvechite - care dateaz?? din anii 1920 ??n unele locuri - este ??nlocuit cu sisteme moderne, computerizate de semnalizare ??i control</li>
                        <li>O mai bun?? informa??ie a clien??ilor ??n direct pe platforme ??i dispozitive inteligente</li>
                    </ul>
                    <a href="https://tfl.gov.uk/travel-information/improvements-and-projects/four-lines-modernisation?intcmp=37984" class="newssource" target="_blank">Sursa: tfl.gov.uk</a>
                </div>
            </div>
        </div>
        <div class="main" id="section3">
            <div class="news">
                <h2 class="newstext">Imbun&#259t&#259&#355irea trenurilor</h2>
                <img src="..\EWD\Imagini\news3.jpg" class="newsimage">
                <div class="newstext">
                    <p>
                        Un nou proiect de tren va asigura c??l??torii mai rapide, mai frecvente ??i mai fiabile cu primele trenuri de mers ??i cu aer condi??ionat pe cele patru linii ???Deep Tube???.</br>
                        Vom ??nlocui trenurile ??i sistemele de semnalizare de-a lungul celor patru linii ???Deep Tube??? - liniile Piccadilly, Bakerloo, Central ??i Waterloo & City</br>
                    </p>
                    <ul style="background-color:transparent;">
                        <li>250 de noi metrou pentru liniile Piccadilly, Bakerloo, Central ??i Waterloo & City, cu primele noi trenuri care vor servi linia Piccadilly ??ncep??nd cu 2024</li>
                        <li>Mai mult?? capacitate cu un serviciu mai rapid ??i mai frecvent</li>
                        <li>Mai mult?? fiabilitate, deoarece sistemele de semnalizare moderne vor asigura mai pu??ine ??nt??rzieri</li>
                        <li>C??ru????ri parcurgi care ajut?? la u??urarea cererii suplimentare la cel mai ??nalt nivel</li>
                        <li>C??rucioare cu aer condi??ionat pentru o c??l??torie mai confortabil??</li>
                        <li>Accesibilitate ??mbun??t????it?? cu acces f??r?? pa??i la nivelul platformei</li>
                    </ul>
                </div>
                <img src="..\EWD\Imagini\news3.1.jpg" class="newsimage">
                <div class="newstext">
                    <h3>Un nou design singular</h3>
                    <p>Cre??m un model pentru un proiect de tren unic, care va fi derulat pe liniile Piccadilly, Bakerloo, Central ??i Waterloo & City, permi????nd procurarea mai eficient?? ??i procedurile de ??ntre??inere pe termen lung.</p>
                    <h3>250 de noi trenuri</h3>
                    <p>Aproximativ dou?? treimi din liniile noastre sunt sau au fost modernizate. De asemenea, avem ??n derulare un program de lucru pentru a cre??te frecven??ele pe liniile actualizate ??i mai departe.</p>
                    <h3>Un sistem de transport mult mai sigur</h3>
                    <p>
                        Ca parte a investi??iilor noastre continue ??n re??eaua de metrou ??i pentru a r??spunde nevoilor popula??iei ??n cre??tere rapid?? a Londrei, continu??m s?? investim ??i s?? ??mbun??t????im serviciile noastre.</br>
                        Prin introducerea de noi sisteme moderne de semnalizare ??i noi trenuri pe liniile Piccadilly, Bakerloo, Central ??i Waterloo & City, ??nt??rzierile datorate defec??iunilor semnalului ??i trenului vor fi reduse.</br>
                        ??n plus, de-a lungul timpului, vom introduce, de asemenea, u??i de margine ale platformei, acolo unde este posibil (a??a cum este folosit pe linia Jubilee), contribuind la asigurarea siguran??ei clien??ilor ??i la reducerea ??nt??rzierilor datorate gunoiului ??i a altor obstruc??ii pe ??ine.</br>
                    </p>
                    <h3>Pentru a raspunde numarului mare de pasageri</h3>
                    <p>Popula??ia Londrei va cre??te de la 8,4 milioane ast??zi la aproximativ 10 milioane p??n?? ??n 2030. Noile sisteme moderne de semnalizare ??i noile trenuri pe care le introducem vor cre??te capacitatea care ne va ajuta s?? facem fa???? acestei provoc??ri.</p>
                    <a href="https://tfl.gov.uk/campaign/tube-improvements/what-we-are-doing/improving-the-trains?intcmp=21153" class="newssource" target="_blank">Sursa: tfl.gov.uk</a>
                </div>
            </div>
        </div>
        <div class="main" id="section4">
            <div class="news">
                <h2 class="newstext">Galerie</h2>
                <div class="container4">
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery1.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery2.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery3.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery4.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery5.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery6.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery7.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery8.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery9.jpg" class="newsimage">
                    </div>
                    <div class="mySlides">
                        <img src="..\EWD\Imagini\gallery10.jpg" class="newsimage">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">???</a>
                    <a class="next" onclick="plusSlides(1)">???</a>
                </div>
            </div>
        </div>
        <script src="..\EWD\JavaScript\slideshowgallery.js"></script>
        <div class="main" id="section5">
            <div class="news">
                <h2 class="newstext">Videoclipuri</h2>
                <div class="container5">
                    <div class="mySlides2">
                        <iframe width="100%" height="615" src="https://www.youtube-nocookie.com/embed/J-_JpmFDeBo" frameborder="0" style="border-radius:10px;"></iframe>
                    </div>
                    <div class="mySlides2">
                        <iframe width="100%" height="615" src="https://www.youtube.com/embed/eQaSMzGfVIQ" frameborder="0" style="border-radius:10px;"></iframe>
                    </div>
                    <div class="mySlides2">
                        <iframe width="100%" height="615" src="https://www.youtube.com/embed/WxiSgDoTb7g" frameborder="0" style="border-radius:10px;"></iframe>
                    </div>
                    <div class="mySlides2">
                        <iframe width="100%" height="615" src="https://www.youtube.com/embed/Vl0zGyqoySs" frameborder="0" style="border-radius:10px;"></iframe>
                    </div>
                    <div class="mySlides2">
                        <iframe width="100%" height="615" src="https://www.youtube.com/embed/UBgwLKyHn5o" frameborder="0" style="border-radius:10px;"></iframe>
                    </div>
                    <a class="prev" onclick="plusSlides2(-1)">???</a>
                    <a class="next" onclick="plusSlides2(1)">???</a>
                </div>
            </div>
        </div>
        <script src="..\EWD\JavaScript\slideshowgallery2.js"></script>
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
