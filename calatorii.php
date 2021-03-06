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
                        <label for="informatii">Introduce&#355i mai multe informa??ii</label>
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
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn"><a href="..\EWD\main.php" class="item">Acas&#259  <i class="fas fa-sort-down"></i></a></button>
                        <div class="dropdown-content">
                            <a href="..\EWD\main.php#section1" class="item">Metroul de noapte</a>
                            <a href="..\EWD\main.php#section2" class="item">Modernizarea celor 4 linii </a>
                            <a href="..\EWD\main.php#section3" class="item">Imbun??t????irea trenurilor</a>
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
                        <li><a href="#calsection5" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">??nt??rzieri</a></li>
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
            <a href="#calsection5" class="newslinksheadline"><h3>??nt??rzieri</h3></a>
        </div>
        <div class="main" id="calsectionmain">
            <div class="main" id="calsection1">
                <div class="news">
                    <h2 class="newstext">Tichete de c&#259l&#259torie</h2>
                    <img src="..\EWD\Imagini\cal1.jpg" class="newsimage">
                    <div class="newstext">
                        <p>Underground a primit 2.669 miliarde lire sterline ??n 2016/17 ??i utilizeaz?? sistemul de tarif Zonal din Londra pentru a calcula tarifele. Exist?? nou?? zone, zona 1 fiind zona central??, care include bucla liniei Circle cu c??teva sta??ii p??n?? la la sud de r??ul Thames. Singurele sta??ii de metrou londoneze din zonele 7 - 9 sunt pe linia metropolitan?? dincolo de Moor Park, ??n afara regiunii londoneze. Unele sta??ii sunt ??n dou?? zone ??i se aplic?? cel mai ieftin tarif. Biletele de h??rtie, cardurile Oyster contactless, cardurile de debit sau de credit contactless ??i smartphone-urile ??i ceasurile Apple Pay ??i Google Pay pot fi utilizate pentru c??l??torii. Biletele simple ??i retur sunt disponibile ??n orice format, dar c??r??ile de c??l??torie (bilete de sezon) mai mult de o zi sunt disponibile doar pe cardurile Oyster.</p>
                        <p>TfL a introdus cardul Oyster ??n 2003; aceasta este o cartel?? inteligent?? cu plat?? ??n avans cu un cip RFID f??r?? contact ??ncorporat. Tarifele pentru c??l??torii unice sunt mai ieftine dec??t biletele de h??rtie, iar o plafon?? zilnic?? limiteaz?? costul total ??ntr-o zi la pre??ul unui card de c??l??torie de zi. Cartea Oyster trebuie s?? fie ???atins????? la ??nceputul ??i sf??r??itul unei c??l??torii, altfel este considerat?? ???incomplet????? ??i se percepe tariful maxim. ??n martie 2012, costul acestui an pentru c??l??torii a fost de 66,5 milioane de lire sterline.</p>
                        <p>??n 2014, TfL a devenit primul furnizor de transport public din lume care a acceptat plata de pe cardurile bancare f??r?? contact. Underground a ??nceput pentru prima dat?? s?? accepte carduri de debit ??i credit f??r?? contact ??n septembrie 2014. Aceasta a fost urmat?? de adoptarea Apple Pay ??n 2015 ??i Google Pay ??n 2016, permi????nd plata folosind un telefon sau smartwatch activat f??r?? contact. Peste 500 de milioane de c??l??torii au avut loc folosind contactless, iar TfL a devenit unul dintre cei mai mari comercian??i f??r?? contact din Europa, cu aproximativ 1 din 10 tranzac??ii f??r?? contact ??n Marea Britanie care au loc pe toat?? re??eaua TfL. Aceast?? tehnologie, dezvoltat?? ??n interior de TfL, a fost licen??iat?? ??n alte ora??e importante precum New York City ??i Boston.</p>
                        <p>Consiliile de la Londra opereaz?? un sistem de tarife concesionare pentru reziden??ii cu handicap sau care ??ndeplinesc anumite criterii de v??rst??. Locuitorii n??scu??i ??nainte de 1951 au fost eligibili dup?? a 60-a aniversare, ??n timp ce cei n??scu??i ??n 1955 vor trebui s?? a??tepte p??n?? la 66 de ani. Numit ???Pass Freedom???, acesta permite deplasarea gratuit?? pe rutele operate de TfL ??i este valabil pe anumite c??i ferate na??ionale servicii ??n Londra la sf??r??it de s??pt??m??n?? ??i dup?? ora 09:30, de luni p??n?? vineri. Din 2010, Freedom Pass a inclus o fotografie a titularului ??ncorporat; dureaz?? cinci ani ??ntre re??nnoiri.</p>
                        <p>??n afar?? de tarifele automate ??i cu personal la sta??ii, Underground func??ioneaz?? ??i pe un sistem de dovad?? a pl????ii. Sistemul este patrulat at??t de inspectori uniforme, c??t ??i de uniforme, cu cititori de c??r??i Oyster. Pasagerii care c??l??toresc f??r?? bilet valabil trebuie s?? pl??teasc?? o tax?? de penalizare de 80 de lire sterline (40 de lire sterline ??n cazul ??n care sunt pl??tite ??n 21 de zile) ??i pot fi urm??ri??i penal pentru evaziune ??n temeiul Regulamentului Legii C??ilor Ferate 1889 ??i al Transportului pentru Reglement??rile din Londra.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Ticketing" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection2">
                <div class="news" style="margin-top:1cm;">
                    <h1 class="newstext">Orarul de func&#355ionare</h1>
                    <div class="newstext">
                        <p>Metroul se ??nchide peste noapte ??n cursul s??pt??m??nii, dar din 2016, liniile Central, Jubilee, Northern, Piccadilly ??i Victoria, precum ??i o sec??iune scurt?? a Overground-ului din Londra au func??ionat toat?? noaptea, vineri ??i s??mb??t??. Primele trenuri circul?? de la aproximativ 05:00, iar ultimele trenuri p??n?? imediat dup?? ora 01:00, cu orele de plecare ulterioare duminic?? diminea??a. ??nchiderile nocturne sunt utilizate pentru ??ntre??inere, dar unele linii r??m??n deschise de Revelion ??i func??ioneaz?? mai multe ore ??n timpul unor evenimente publice majore, cum ar fi Jocurile Olimpice de la Londra din 2012. Unele linii sunt ??nchise ocazional pentru lucr??ri de inginerie programate la sf??r??it de s??pt??m??n??.</p>
                        <p>Metroul are un serviciu limitat ??n ajunul Cr??ciunului, cu unele linii care se ??nchid mai devreme ??i nu func??ioneaz?? ??n ziua de Cr??ciun. ??ncep??nd cu 2010, o disput?? ??ntre London Underground ??i sindicatele cu privire la plata vacan??elor a dus la un serviciu limitat ??n ziua  na&#355ionala a boxului.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Hours_of_operation" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection3">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">Acces pentru persoanele cu handicap</h2>
                    <img src="..\EWD\Imagini\cal2.jpg" class="newsimage">
                    <div class="newstext">
                        <p>Accesibilitatea pentru persoanele cu mobilitate limitat?? nu a fost luat?? ??n considerare atunci c??nd a fost construit?? cea mai mare parte a sistemului ??i, ??nainte de 1993, reglement??rile privind incendiile interziceau scaunele cu rotile pe metrou. Sta??iile de extindere a liniei Jubilee, deschise ??n 1999, au fost primele sta??ii ale sistemului proiectate cu accesibilitate ??n minte, dar modernizarea func??iilor de accesibilitate la sta??iile mai vechi este o investi??ie major?? care este planificat?? s?? dureze peste dou??zeci de ani. Un raport al Adun??rii de la Londra din 2010 a concluzionat c?? peste 10% dintre persoanele din Londra aveau mobilitate redus?? ??i, cu o popula??ie ??mb??tr??nit??, num??rul va cre??te ??n viitor.</p>
                        <p>Harta standard a metrourilor de emisiune indic?? sta??iile care sunt f??r?? pas de la strad?? la platforme. De asemenea, poate exista un pas de la platform?? la tren p??n?? la 300 cm (12 cm) ??i un decalaj ??ntre tren ??i platformele curbe, iar aceste distan??e sunt marcate pe hart??. Accesul de la platform?? la tren ??n unele sta??ii poate fi asistat folosind o ram?? de ??mbarcare operate de personal, iar o sec??iune a fost ridicat?? pe unele platforme pentru a reduce pasul.</p>
                        <p>??ncep??nd cu februarie 2020, exist?? 79 de sta??ii cu acces f??r?? trecere de la platform?? la tren ??i exist?? planuri de a oferi acces f??r?? trepte la alte 19 sta??ii p??n?? ??n 2024. P??n?? ??n 2016, o treime dintre sta??ii aveau cocoa??e de platform?? care reduc pasul din platforma pentru a se antrena. [Trenurile noi, cum ar fi cele introduse ??n re??eaua de sub-suprafa????, au acces ??i spa??iu pentru scaune cu rotile, sisteme ??mbun??t????ite de informa??ii audio ??i vizuale ??i controale de u???? accesibile.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Accessibility" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection4">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">Siguran&#355&#259 &#351i responsabilitate</h2>
                    <div class="newstext">
                        <p>Metroul din Londra este autorizat s?? opereze trenuri de c??tre Oficiul Reglement??rii Feroviare. La 19 martie 2013 au trecut 310 zile de la ultimul incident major, c??nd un pasager a murit dup?? ce a c??zut pe pista. ??ncep??nd cu 2015, au existat nou?? ani consecutivi ??n care nu s-au produs victime ale angaja??ilor. O unitate special?? de preg??tire a personalului a fost deschis?? ??n sta??ia de metrou West Ashfield din Ashley House din TFL, West Kensington, ??n 2010, cu un cost de 800.000 lire sterline. ??ntre timp, primarul Londrei Boris Johnson a decis ca acesta s?? fie demolat ??mpreun?? cu Centrul Expozi??ional Earls Court, ca parte a celei mai mari scheme de regenerare din Europa.</p>
                        <p>??n noiembrie 2011, s-a raportat c?? 80 de persoane au murit prin sinucidere ??n anul precedent pe metroul Londrei, peste 46 ??n 2000. Majoritatea platformelor de la sta??iile de metrou ad??nc au gropi, adesea denumite ???gropi de sinucidere???, sub piste. Acestea au fost construite ??n 1926 pentru a ajuta scurgerea apei de pe platforme, dar reduc la jum??tate ??i probabilitatea unei fatalit????i atunci c??nd un pasager cade sau sare ??n fa??a unui tren.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Safety" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            <div class="main" id="calsection5">
                <div class="news" style="margin-top:1cm;">
                    <h2 class="newstext">??nt??rzieri ??i supraaglomerare</h2>
                    <img src="..\EWD\Imagini\cal3.jpg" class="newsimage">
                    <div class="newstext">
                        <p>??n orele de v??rf, sta??iile pot ajunge at??t de aglomerate ??nc??t trebuie s?? fie ??nchise. Este posibil ca pasagerii s?? nu urce pe primul tren, iar majoritatea pasagerilor nu g??sesc un loc ??n trenurile lor, unele trenuri av??nd mai mult de patru pasageri la fiecare metru p??trat. C??nd li se cere, pasagerii raporteaz?? supraaglomerarea ca aspect al re??elei de care sunt cel mai pu??in satisf??cu??i, iar supraaglomerarea a fost legat?? de o productivitate slab?? ??i de o s??n??tate cardiac?? poten??ial?? precar??. Cre??terile capacit????ii au fost dep????ite de cre??terea cererii, iar supraaglomera??ia maxim?? a crescut cu 16% din 2004/5.</p>
                        <p>Fa???? de 2003/4, fiabilitatea re??elei a crescut ??n 2010/11, iar orele pierdute ale clien??ilor s-au redus de la 54 de milioane la 40 de milioane. Pasagerii au dreptul la o rambursare ??n cazul ??n care c??l??toria lor este ??nt??rziat?? cu 15 minute sau mai mult din cauza circumstan??elor aflate sub controlul TfL, iar ??n 2010, 330.000 de pasageri din un poten??ial 11 milioane de pasageri cu tubul au solicitat compensa??ii pentru ??nt??rzieri. Aplica??iile ??i serviciile de telefoane mobile au fost dezvoltate pentru a ajuta pasagerii s?? solicite restituirea mai eficient??.</p>
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