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
                            <a href="..\EWD\infrastructura.php#infsection3" class="item">Extinderi ??i ??mbun??t????iri propuse</a>
                        </div>
                    </div>
                    <a href="..\EWD\istoric.php" class="active">Istoric</a>
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
                        <li><a href="#historysection5" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Compania de C??i Ferate Electrice Subterane</a></li>
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
            <a href="#historysection5" class="newslinksheadline"><h3>Compania de C??i Ferate Electrice Subterane</h3></a><hr>
            <a href="#historysection6" class="newslinksheadline"><h3>London Passenger Transport Board</h3></a><hr>
            <a href="#historysection7" class="newslinksheadline"><h3>Transport for London</h3></a>
        </div>
        <div class="main" id="historysection0">
            <div class="timeline">
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1863</h3>
                        <p>Istoria metroului londonez ??ncepe cu Metropolitan Railway, prima cale ferat?? subteran?? pentru transport de pasageri din lume. Metropolitan Railway a ??nceput s?? func??ioneze la 10 ianuarie 1863 ??ntre sta??iile Paddington ??i Farringdon.</br>
                            Datorit?? avansului tehnic,s-a putut trece la s??parea tunelelor de ad??ncime mare, a??a numitele "tuburi".
                        </p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1880</h3>
                        <p>Linia s-a extins treptat, ajung??nd ca ??n 1880 s?? transporte peste 40 de milioane de c??l??tori anual. Metropolitan Railway a evoluat ??n ceea ce azi este cunoscut?? drept Metropolitan line.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1884</h3>
                        <p> ??n 1884 s-a ??ncheiat ??i construc??ia "cercului" care ocole??te zona central?? a Londrei, ast??zi Circle Line.</p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1902</h3>
                        <p>Fiecare linie era operat?? de o companie diferit??, ceea ce producea destule nepl??ceri, pasagerii fiind nevoi??i s?? ias?? la suprafa???? pentru a schimba o linie cu alta. Magnatul american Charles Yerkes a cump??rat majoritatea acestor companii, consolid??ndu-le ??ntr-una singur?? numit?? Underground Electric Railways of London Company Ltd. (UERL), pe 9 aprilie 1902.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>1933</h3>
                        <p>??n 1933 a ap??rut corpora??ia public?? London Passenger Transport Board, sub tutela c??reia au fost plasate companiile operatoare de trenuri de metrou.</br>
                            ??n timpul celui de-al doilea r??zboi mondial, sta??iile de metrou au servit ca bunc??re ??n timpul raidurilor aeriene, sau chiar ca fabrici de muni??ii.
                            Dup?? r??zboi, num??rul c??l??torilor a crescut constant, ajung??ndu-se la dese perioade de congestie. 
                        </p>
                    </div>
                </div>
                <div class="container2 right2">
                    <div class="content2">
                        <h3>1960-1999</h3>
                        <p>Dup?? r??zboi, num??rul c??l??torilor a crescut constant, ajung??ndu-se la dese perioade de congestie. S-au construit noi linii de ad??ncime, Victoria Line (prima linie automat?? ??n anii 1960) ??i Jubilee Line ??n anii 70, extins?? ??n 1999 (p??n?? ??n 1999 tenurile se opreau la Charing Cross). De asemenea, linia Piccadilly a fost extins?? p??n?? la aeroportul Heathrow ??n 1977.</p>
                    </div>
                </div>
                <div class="container2 left2">
                    <div class="content2">
                        <h3>2000-2018</h3>
                        <p>Din anul 2000, Metroul londonez este ??n proprietatea ??i administrarea companiei publice de transport a Londrei mari, Transport for London (TfL). Liniile de metrou au fost par??ial privatizate ??n 2003, printr-un parteneriat public-privat ??ntre TfL ??i dou?? consor??ii de firme, Metronet respectiv Tube Lines. Parteneriatul are ca scop principal renovarea total?? a ??inelor, a instala??iilor de semnalizare, a sta??iilor ??i a ramelor de tren de pe toate cele 12 linii de metrou. Investi??ia este enorm?? (de ordinul zecilor de miliarde de lire sterline), iar renovarea se preconizeaz?? s?? se ??ncheie ??n anii 2020.</p>
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
                        <p>Ideea unei c??i ferate subterane care leag?? City of London cu centrul urban a fost propus?? ??n anii 1830, iar Metropolitan Railway a primit permisiunea de a construi o astfel de linie ??n 1854. Pentru a preg??ti construc??ia, ??n 1855 a fost construit un tunel de ??ncercare scurt ??n Kibblesworth , un ora?? mic cu propriet????i geologice similare cu Londra. Acest tunel de ??ncercare a fost utilizat timp de doi ani la dezvoltarea primului tren subteran, iar mai t??rziu, ??n 1861, a fost completat. Prima cale ferat?? de metrou din lume, s-a deschis ??n ianuarie 1863 ??ntre Paddington ??i Farringdon folosind c??rucioare din lemn cu gaz, trase de locomotive cu aburi. A fost salutat ca un succes, transport??nd 38.000 de pasageri ??n ziua deschiderii ??i ??mprumut??nd trenuri de la alte c??i ferate pentru a suplimenta serviciul. Metropolitan District Railway (cunoscut?? sub denumirea de District Railway) s-a deschis ??n decembrie 1868 de la South Kensington la Westminster, ca parte a unui plan pentru un ???cerc interior??? subteran care leag?? sta??iile de linie principal?? din Londra. C??ile ferate metropolitane ??i districtul au completat linia Circle ??n 1884, construit?? folosind metoda t??ieturii ??i acoperirii. Ambele c??i ferate s-au extins, Districtul construind cinci ramuri spre vest, ajung??nd la Ealing, Hounslow, Uxbridge, Richmond ??i Wimbledon ??i Metropolitan ??n cele din urm?? s-au extins p??n?? la Verney Junction ??n Buckinghamshire, la peste 50 de mile (80 km) de Baker Street ??i centrul din Londra.</p>
                    </div>
                    <div class="main" id="historysection3">
                        <h4>Linii de nivel profund</h4>
                        <img src="..\EWD\Imagini\history2.jpg" align="right" style="width:100%;"/>
                        <p>Pentru prima linie de tuburi ad??ncime, City and South London Railway, au fost s??pate dou?? tuneluri circulare cu diametrul de 10,10 m diametru ??ntre strada William King (aproape de sta??ia Monument de ast??zi) ??i Stockwell, pe drumurile pentru a evita nevoie de acord cu proprietarii de propriet????i la suprafa????. Aceasta s-a deschis ??n 1890 cu locomotive electrice care transportau c??rucioare cu ferestre mici opace, poreclite celule c??ptu??ite. Waterloo ??i City Railway s-au deschis ??n 1898, urmate de Central London Railway ??n 1900, cunoscut?? sub numele de ???tubul twopenny???. Aceste dou?? circulau cu trenuri electrice ??n tuneluri circulare, cu diametre cuprinse ??ntre 3.56 m ??i 1172 cm ??i 3,72 m, ??n timp ce Marea C??i Ferate de Nord ??i Ora??, care a fost deschis?? ??n 1904, a fost construit?? pentru a lua trenuri de linie principal?? din Parcul Finsbury c??tre un terminal Moorgate din ora?? ??i avea tuneluri de 4,9 m diametru.</p>
                        <p>??n timp ce locomotivele cu abur erau utilizate ??n metrou, au existat rapoarte de s??n??tate contrastante. ??n timp ce c??l??torii, din cauza c??ldurii ??i a polu??rii, s-au pr??bu??it multe cazuri de c??l??tori, ceea ce a dus la apeluri pentru cur????area aerului prin instalarea instala??iilor de gr??din??. Mitropolitul chiar a ??ncurajat b??rbele pentru ca personalul s?? ac??ioneze ca filtru de aer. Au existat alte rapoarte care pretind rezultate benefice ale utiliz??rii metroului, inclusiv desemnarea Great Portland Street ca ???sanatoriu pentru [persoanele care sufer?? de astm] ??i pl??ngeri bron??ice???, amigdalita ar putea fi vindecat?? cu gaz acid ??i tubul Twopenny vindecat anorexie .</p>
                    </div>
                    <div class="main" id="historysection4">
                        <h4>Electrificare</h4>
                        <p>Odat?? cu apari??ia serviciilor de tuburi electrice (Waterloo ??i City Rail ??i Marea C??i Ferate Nord ??i Ora??), Feroviarul Electric Volks din Brighton ??i concuren??a tramvaielor electrice, companiile de metrou de pionierat au avut nevoie de modernizare. La ??nceputul secolului al XX-lea, c??ile ferate district ??i metropolitane aveau nevoie de electrificare, iar un comitet mixt a recomandat un sistem de curent alternativ, cele dou?? companii cooper??nd din cauza propriet????ii comune a cercului interior. Districtul, care trebuia s?? str??ng?? finan??ele necesare, a g??sit un investitor ??n americanul Charles Yerkes, care a favorizat un sistem de curent continuu similar celui utilizat pe c??ile ferate City & South London ??i Central London. Calea ferat?? metropolitan?? a protestat cu privire la schimbarea planului, dar dup?? arbitraj de c??tre Consiliul Comer??ului, sistemul DC a fost adoptat.</p>
                    </div> 
                    <div class="main" id="historysection5">
                        <h3>Compania de C??i Ferate Electrice Subterane</h3>
                        <p>??n cur??nd, Yerkes a controlat sistemul de cale ferat?? al districtului ??i a ??nfiin??at Compania de c??i ferate electrice subterane din Londra (UERL) ??n 1902 pentru a finan??a ??i opera trei linii de tuburi, Baker Street ??i Waterloo Railway (Bakerloo), Charing Cross, Euston ??i Hampstead Railway (Hampstead ) ??i Great Northern, Piccadilly ??i Brompton Railway, (Piccadilly), care s-au deschis toate ??ntre 1906 ??i 1907. C??nd ???Bakerloo??? a fost numit astfel ??n iulie 1906, The Railway Magazine l-a numit un ???titlu de jgheab??? nedemn. P??n?? ??n 1907, districtul ??i c??ile ferate metropolitane au electrificat sec??iunile subterane ale liniilor lor.</p>
                        <p>??n ianuarie 1913, UERL a achizi??ionat Central London Railway ??i City & South London Railway, precum ??i mul??i dintre operatorii de autobuze ??i tramvai din Londra. Doar Metropolitan Railway, ??mpreun?? cu filialele sale Great Northern & City Railway ??i East London Railway, ??i Waterloo & City Railway, de??inute atunci de linia principal?? London ??i South Western Railway, au r??mas ??n afara controlului grupului subteran.</p>
                        <img src="..\EWD\Imagini\history3.png" align="right" style="width:100%;" />
                        <p>Un acord de marketing comun ??ntre majoritatea companiilor din primii ani ai secolului XX a inclus h??r??i, publicitate comun??, prin ticketing ??i semnele UNDERGROUND, care ??ncorporeaz?? primul simbol bullseye, ??n afara sta??iilor din centrul Londrei. La vremea respectiv??, termenul Underground a fost selectat din alte trei nume propuse; ???Tubul??? ??i ???Electricul??? au fost ambele respinse oficial. ??n mod ironic, termenul Tube a fost adoptat ulterior al??turi de Underground. Linia Bakerloo a fost extins?? spre nord p??n?? la Queen's Park pentru a se al??tura unei noi linii electrice de la Euston la Watford, dar Primul R??zboi Mondial a ??nt??rziat construc??ia ??i trenurile au ajuns la Watford Junction ??n 1917. ??n timpul raidurilor aeriene din 1915, oamenii au folosit sta??iile de metrou drept ad??posturi. O extindere a liniei centrale spre vest p??n?? la Ealing a fost, de asemenea, ??nt??rziat?? de r??zboi ??i a fost finalizat?? ??n 1920. Dup?? ce garan??iile financiare sus??inute de guvern au fost folosite pentru extinderea re??elei, iar tunelurile din City ??i South London ??i c??ile ferate Hampstead au fost legate la Euston ??i Kennington; serviciul combinat nu a fost numit linia de Nord dec??t mai t??rziu. Metropolitan a promovat imobile ??n apropiere de calea ferat?? cu marca ???Metro-land??? ??i nou?? imobile au fost construite ??n apropierea sta??iilor de pe linie. Electrificarea s-a extins la nord de la Harrow la Rickmansworth, iar ramurile s-au deschis de la Rickmansworth la Watford ??n 1925 ??i de la Wembley Park la Stanmore ??n 1932. Linia Piccadilly s-a extins la nord p??n?? la Cockfosters ??i a preluat ramurile liniei Districtului spre Harrow (ulterior Uxbridge) ??i Hounslow.</p>
                    </div>
                    <div class="main" id="historysection6">
                        <h3>London Passenger Transport Board</h3>
                        <p>??n 1933, majoritatea c??ilor ferate subterane, tramvaie ??i autobuze din Londra au fost contopite pentru a forma Consiliul de transport al pasagerilor din Londra, care a folosit marca London Transport. Waterloo & City Rail, aflat?? p??n?? atunci ??n proprietatea liniei principale Southern Railway, a r??mas cu proprietarii existen??i. ??n acela??i an ??n care s-a constituit Consiliul de transport al pasagerilor din Londra, a ap??rut pentru prima dat?? harta schematic?? a tubului lui Harry Beck.</p>
                        <p>??n anii urm??tori, liniile periferice ale fostei c??i ferate metropolitane s-au ??nchis, tramvaiul Brill ??n 1935 ??i linia de la Quainton Road la Verney Junction ??n 1936. Programul de lucr??ri noi din 1935???40 a inclus extinderea liniilor centrale ??i nordice ??i linia Bakerloo pentru a prelua sucursala Stanmore a Mitropoliei. Al doilea r??zboi mondial a suspendat aceste planuri dup?? ce linia Bakerloo a ajuns la Stanmore ??i linia de nord High Barnet ??i Mill Hill East ??n 1941. ??n urma bombardamentelor din 1940 serviciile de pasageri peste linia de Vest a Londrei au fost suspendate, l??s??nd centrul expozi??ional Olympia f??r?? un serviciu feroviar p??n?? la Navetele de linie de district de la Curtea lui Earl au ??nceput dup?? r??zboi. Dup?? repunerea lucr??rilor la extensiile liniei centrale din estul ??i vestul Londrei, acestea au fost complete ??n 1949.</p>
                        <img src="..\EWD\Imagini\history4.jpg" class="newsimage">
                        <p>??n timpul r??zboiului, numeroase sta??ii de metrou au fost folosite ca ad??posturi de raid aerian. La 3 martie 1943, un test al sirenelor de avertizare ??mpotriva atacului aerian, ??mpreun?? cu tragerea unui nou tip de rachet?? antiaerian??, au dus la o zdrobire de oameni care ??ncercau s?? se ad??posteasc?? ??n sta??ia de metrou Green Bethnal. Un total de 173 de persoane, inclusiv 62 de copii, au murit, ceea ce a devenit cel mai grav dezastru civil al celui de-al Doilea R??zboi Mondial, precum ??i cea mai mare pierdere de via???? ??ntr-un singur incident ??n re??eaua de metrou din Londra.</p>
                    </div>
                    <div class="main" id="historysection7">
                        <h3>Transport for London</h3>
                        <p>Transport for London (TfL) a fost creat ??n anul 2000 ca organism integrat responsabil pentru sistemul de transport din Londra. TfL face parte din Greater London Authority ??i este constituit?? ca o corpora??ie legal?? reglementat?? ??n conformitate cu regulile de finan??e ale administra??iei locale. Consiliul TfL este numit de primarul Londrei, care stabile??te, de asemenea, structura ??i nivelul tarifelor de transport public la Londra. Func??ionarea cotidian?? a corpora??iei este l??sat?? comisarului transporturilor pentru Londra.</p>
                        <img src="..\EWD\Imagini\history5.jpg" class="newsimage">
                        <p>??n cele din urm??, TfL a ??nlocuit London Regional Transport ??i a ??ntrerupt utilizarea m??rcii London Transport ??n favoarea propriei m??rci. Transferul de responsabilitate a fost organizat, transferul controlului subteranului londonez a ??nt??rziat p??n?? ??n iulie 2003, c??nd London Underground Limited a devenit o filial?? indirect?? a TfL. ??ntre 2000 ??i 2003, London Underground a fost reorganizat ??ntr-un Parteneriat public-privat unde companiile de infrastructur?? privat?? (infracos) au modernizat ??i au men??inut calea ferat??. Acest lucru a fost ??ntreprins ??nainte de a trece controlul c??tre TfL, care s-au opus acordului. O infrastructur?? a intrat ??n administra??ie ??n 2007, iar TfL a preluat responsabilit????ile, TfL prelu??nd-o pe cealalt?? ??n 2010.</p>
                        <p>Biletele electronice sub forma cardului Oyster f??r?? contact au fost introduse ??n 2003. Serviciile London Underground de pe linia East London au ??ncetat ??n 2007, pentru a putea fi extinse ??i transformate ??n opera??iunea London Overground, iar ??n decembrie 2009, linia Circle a schimbat din a servi un bucl?? ??nchis?? ??n jurul centrului Londrei c??tre o spiral?? care serve??te ??i Hammersmith. Din septembrie 2014, pasagerii au putut utiliza carduri f??r?? contact pe Tube. Utilizarea lor a crescut foarte repede ??i acum peste un milion de tranzac??ii f??r?? contact se fac zilnic ??n subteran.</p>
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