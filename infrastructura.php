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
        <title>Infrastructur&#259 - London Underground</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="..\EWD\Imagini\favicon.png" type="image/png">
        <script src="https://kit.fontawesome.com/7b02bf280d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\nav.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\contact_alerts.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\navbar.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\main.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\footerframe.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\infrastructure.css">
        <script src="..\EWD\JavaScript\countdown.js"></script>
        <script src="..\EWD\JavaScript\loadingline.js"></script>
    </head>
    <body onload="move();timedText();hideAlert()">
        <div class="container">
            <img src="..\EWD\Imagini\infrastructurawelcome.jpg" class="img">
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
                    <a href="..\EWD\infrastructura.php" class="active">Infrastructur&#259</a>
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
                        <li><a href="..\EWD\infrastructura.php" style="text-decoration:underline;">Infrastructur&#259</a></li>
                        <li><a href="..\EWD\calatorii.php" class="underlinenav">C&#259l&#259torii</a></li>
                    </ul>
                </div>
                <div class="rpnavmenu" id="rpnewslinks" style="width: 100%;">
                    <ul style="list-style-type:none;">
                        <li style="padding:5px 16px;margin-bottom:30px;margin-right:30px;">
                            <a href="..\EWD\main.php" style="float:left;"><img src="..\EWD\Imagini\undergroundlogo.png" class="undergroundlogo"></a>
                            <a href="#" style="float:right;margin-top:20px;" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'"><i class="fas fa-arrow-circle-up"></i></a>
                        </li></br></br>
                        <li><a href="#infsection1" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Calea ferat&#259</a></li>
                        <li><a href="#infsection2" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Linii</a></li>
                        <li><a href="#infsection3" class="underlinenav" onclick="document.getElementById('rpnavmenu1id').style.display='block';document.getElementById('rpnewslinks').style.display='none'">Extinderi ??i ??mbun??t????iri propuse</a></li>
                    </ul>
                </div>                      
            </div>
            <div class="line4"><p style="font-size:3vw;margin-left:200px;">Infrastructur&#259</p></div>
            <div class="line5"><a href="#infsectionmain"><button class="buttonmain button10 animate">Exploreaz&#259</button></a></div>
        </div>
        <div class="newslinks" style="margin-top: 1cm;">
            <div class="newslinksheadline">
                <a href="#infsectionmain" class="newslinksheadline"><h2>Infrastructur&#259</h2></a>
            </div>
            <a href="#infsection1" class="newslinksheadline"><h3>Calea ferat&#259</h3></a><hr>
            <a href="#infsection2" class="newslinksheadline"><h3>Linii</h3></a><hr>
            <a href="#infsection3" class="newslinksheadline"><h3>Extinderi ??i ??mbun??t????iri propuse</h3></a>
        </div>
        <div class="main" id="infsectionmain">
            <div class="main" id="infsection1">
                <div class="news">
                    <h2 class="newstext">Calea ferat&#259</h2>
                    <img src="..\EWD\Imagini\inf1.png" class="newsimage">
                    <div class="newstext">
                        <p>Metroul serve??te 270 de sta??ii. ??aisprezece sta??ii de metrou sunt ??n afara regiunii Londra, opt pe linia Metropolitan ??i opt pe linia Central??. Dintre acestea, cinci (Amersham, Chalfont & Latimer, Chesham ??i Chorleywood pe linia Metropolitan ??i Epping pe linia central??), sunt dincolo de autostrada M25 London Orbital. Din cele 32 de ora??e din Londra, ??ase (Bexley, Bromley, Croydon, Kingston, Lewisham ??i Sutton) nu sunt deservite de re??eaua de metrou, ??n timp ce Hackney are Old Street (pe filiera Northern Bank Bank) ??i Manor House (pe linia Piccadilly) doar ??n interiorul limitelor sale. Lewisham obi??nuia s?? fie deservit?? de linia East London (sta??ii la New Cross ??i New Cross Gate). Linia ??i sta??iile au fost transferate ??n re??eaua London Overground din 2010.</p>
                        <p>Cele 11 linii ale metroului London Underground au o lungime de 402 kilometri (250 mi), ceea ce ??l face cel de-al cincilea sistem de metrou cel mai lung din lume. Acestea sunt formate din re??eaua de sub-suprafa???? ??i liniile de tuburi profunde. Liniile Circle, District, Hammersmith & City ??i Metropolitan formeaz?? re??eaua de sub-suprafa????, cu tuneluri feroviare chiar sub suprafa???? ??i cu o dimensiune similar?? cu cele pe liniile principale britanice, converg??nd pe o bucl?? bi-direc??ional?? circular?? ??n jurul zonei 1. Liniile Hammersmith & City ??i Circle ??mpart sta??ii ??i cea mai mare parte a traseului lor unul cu cel??lalt, precum ??i cu liniile Metropolitan ??i District. Liniile Bakerloo, Central, Jubilee, Nord, Piccadilly, Victoria ??i Waterloo & City sunt tuburi la nivel ad??nc, cu trenuri mai mici care circul?? ??n dou?? tuneluri circulare (tuburi) cu un diametru de aproximativ 3,56 m. Aceste linii au ??n exclusivitate utilizarea unei perechi de piese, cu excep??ia filialei Uxbridge a liniei Piccadilly, care ??mp??rt????e??te linia de district dintre Acton Town ??i Hanger Lane Junction ??i cu linia metropolitan?? dintre Rayners Lane ??i Uxbridge; ??i linia Bakerloo, care ??mp??rt????e??te traseul cu linia Watford DC din Londra Overground pentru sec??iunea de la suprafa??a de la nord de Queen's Park.</p>
                        <p>Cincizeci ??i cinci la sut?? din sistem ruleaz?? la suprafa????. Exist?? 20 de mile (32 km) de tunel t??iat ??i acoperit ??i 150 de mile (150 km) de tunel. Multe dintre sta??iile de metrou centrale din Londra, pe traseele de tuburi de nivel ad??nc, sunt mai mari dec??t liniile de rulare pentru a ajuta la decelerarea la sosire ??i accelerarea la plecare. Trenurile circul?? ??n general pe calea din st??nga. ??n unele locuri, tunelurile sunt unul peste altul (de exemplu, linia central?? la est de sta??ia St Paul), sau tunelurile care circul?? sunt pe dreapta (de exemplu, pe linia Victoria dintre strada Warren ??i King's Cross St. Pancras, spre permite schimbul de platforme ??ncruci??ate cu linia de Nord la Euston).</p>
                        <p>Liniile sunt electrificate cu un sistem continuu cu patru ??ine: o linie conductor ??ntre ??ine este alimentat?? la ???210 V ??i o ??in?? ??n afara ??inelor de rulare la +420 V, oferind o diferen???? de poten??ial de 630 V. Pe sec??iunile de linie partajate cu trenuri principale, cum ar fi linia districtului de la East Putney la Wimbledon ??i Gunnersbury p??n?? la Richmond ??i linia Bakerloo la nord de Queen's Park, calea ferat?? central?? este legat?? de ??inele rulante.</p>
                        <p>Viteza medie pe metrou este de 20,0 mph (33,0 km / h). ??n afara tunelurilor din centrul Londrei, mai multe trenuri de linii tind s?? circule cu peste 64 km / h (64 km / h) ??n zonele suburbane ??i din mediul rural. Linia metropolitan?? poate atinge viteze de 62 km / h.</p>
                    </div>
                    <a href="https://en.wikipedia.org/wiki/London_Underground#Railway" class="newssource" target="_blank" style="margin-top: 10px;">Sursa: Wikipedia.org</a>
                </div>
            </div>
            <div class="main" id="infsection2">
                <div class="tablestructure" style="margin-top: 50px;overflow-x:auto;">
                    <h2 class="newstext">Liniile metroului londonez</h2>
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>Numele liniei</th>
                                <th>Culoarea liniei</th>
                                <th>Data deschiderii</th>
                                <th>Tipul liniei</th>
                                <th>Lungime</th>
                                <th colspan="2">Termina&#355ii</th>
                                <th>Numarul de sta&#355ii</th>
                                <th>Depouri</th>
                                <th>Modelul de locomotiv&#259</th>
                                <th>Numarul de vagoane</th>
                                <th>Media calatorilor pe s&#259pt&#259m&#226n&#259</th>
                                <th>C&#259l&#259torii pe an</th>
                                <th>Media c&#259l&#259toriilor per mil&#259</th>
                            </tr>
                            <tr>
                                <th>Northern line</th>
                                <th style="background-color: black; color:white;">Neagr&#259</th>
                                <th>1890</th>
                                <th>Ad&#226ncime mare</th>
                                <th>58.0 km</th>
                                <th><p>Kennington</br>Modern</p></th>
                                <th><p>Edgware</br>High Barnet</br>Mill Hill East</br>Golders Green</p></th>
                                <th>50</th>
                                <th><p>Golders Green</br>Morden</p></th>
                                <th>Locomotive din 1995</th>
                                <th>6</th>
                                <th>1,123,342</th>
                                <th>294,000</th>
                                <th>8,166</th>
                            </tr>
                            <tr>
                                <th>Central line</th>
                                <th style="background-color: red; color:white;">Ro&#351ie</th>
                                <th>1900</th>
                                <th>Ad&#226ncime mare</th>
                                <th>74.0 km</th>
                                <th><p>West Ruislip</br>Ealing Broadway</br>Northolt</br>White City</p></th>
                                <th><p>Hainault</br>Woodford</br>Epping</br>Loughton</br>Leytonstone</br>Newbury Park</p></th>
                                <th>49</th>
                                <th><p>West Ruislip</br>Hainault</br>White City</p></th>
                                <th>Locomotive din 1992</th>
                                <th>8</th>
                                <th>1,021,084</th>
                                <th>288,800</th>
                                <th>6,278</th>
                            </tr>
                            <tr>
                                <th>Jubilee line</th>
                                <th style="background-color: grey; color:white;">Gri</th>
                                <th>1979</th>
                                <th>Ad&#226ncime mare</th>
                                <th>36.2 km</th>
                                <th><p>Stanmore</br>Wembley Park</br>Willesden Green</p></th>
                                <th><p>Stratford</br>North Greenwich</br>West Ham</p></th>
                                <th>27</th>
                                <th><p>Neasden</br>Stratford Market</p></th>
                                <th>Locomotive din 1996</th>
                                <th>7</th>
                                <th>999,561</th>
                                <th>280,400</th>
                                <th>6,278</th>
                            </tr>
                            <tr>
                                <th>Victoria line</th>
                                <th style="background-color: lightblue; color:white;">Albastru deschis</th>
                                <th>1968</th>
                                <th>Ad&#226ncime mare</th>
                                <th>21.0 km</th>
                                <th><p>Brixton</br>Victoria</p></th>
                                <th><p>Walthamstow</br>Central</br>Seven Sisters</p></th>
                                <th>16</th>
                                <th>Northumberland Park</th>
                                <th>Locomotive din 2009</th>
                                <th>8</th>
                                <th>955,823</th>
                                <th>263,400</th>
                                <th>20,261</th>
                            </tr>
                            <tr>
                                <th>District line</th>
                                <th style="background-color: green; color:white;">Verde</th>
                                <th>1868</th>
                                <th>Ad&#226ncime mic&#259</th>
                                <th>64.0 km</th>
                                <th><p>Ealing Broadway</br>Kensigston (Olympia)</br>Richmond</br>Wimblendon</p></th>
                                <th><p>High Street</br>Kensigston</br>Edgware Road</br>Tower Hill</br>Barking</br>Upminster</p></th>
                                <th>60</th>
                                <th><p>Upminster</br>Ealing Common</br>Lille Bridge</p></th>
                                <th>Locomotivele din 2010 (S7 Stock)</th>
                                <th>7</th>
                                <th>842,991</th>
                                <th>226,100</th>
                                <th>5,652</th>
                            </tr>
                            <tr>
                                <th>Picadilly line</th>
                                <th style="background-color: darkblue; color:white;">Albastru &#238nchis</th>
                                <th>1906</th>
                                <th>Ad&#226ncime mare</th>
                                <th>71.0 km</th>
                                <th><p>Cockfosters</br>Arnos Grove</br>Oakwood</p></th>
                                <th><p>Heathrow Terminals 2 & 3</br>Heathrow Terminal 4</br>Heathrow Terminal 5</br>Nortfields</br>Acton Town</br>Rayners Lane</br>Uxbridge</p></th>
                                <th>53</th>
                                <th><p>Cockfosters</br>Northfields</p></th>
                                <th>Locomotive din 1973</th>
                                <th>7</th>
                                <th>710,647</th>
                                <th>206,900</th>
                                <th>4,670</th>
                            </tr>
                            <tr>
                                <th>Bakerloo line</th>
                                <th style="background-color: brown; color:white;">Maro</th>
                                <th>1906</th>
                                <th>Ad&#226ncime mare</th>
                                <th>23.2 km</th>
                                <th><p>Haarow & Wealdstone</br>Queen's Park</br>Stonebridge Park</p></th>
                                <th><p>Elephant & Castle</br>Waterloo</p></th>
                                <th>25</th>
                                <th><p>Stonebridge Park</br>London Road</br>Queen's Park</p></th>
                                <th>Locomotive din 1972</th>
                                <th>7</th>
                                <th>401,123</th>
                                <th>117,000</th>
                                <th>8,069</th>
                            </tr>
                            <tr>
                                <th>Metropolitan line</th>
                                <th style="background-color: magenta; color:white;">Magenta</th>
                                <th>1863</th>
                                <th>Ad&#226ncime mic&#259</th>
                                <th>66.7 km</th>
                                <th><p>Baker Street</br>Aldgate</br>Harrow-on-the-Hill</p></th>
                                <th><p>Amersham</br>Chesham</br>Uxbridge</br>Watford</br>Ricksmanworth</p></th>
                                <th>34</th>
                                <th>Neasden</th>
                                <th>Locomotive din 2010 (S8 Stock)</th>
                                <th>8</th>
                                <th>352,464</th>
                                <th>80,900</th>
                                <th>1,926</th>
                            </tr>
                            <tr>
                                <th>Circle line</th>
                                <th style="background-color: yellow; color:black;">Galben</th>
                                <th>1871</th>
                                <th>Ad&#226ncime mic&#259</th>
                                <th>27.2 km</th>
                                <th>Hammersmith (via Moorgate and Ladbroke Grove)</th>
                                <th>Edgware Road (via Embankment and Notting Hill Gate)</th>
                                <th>36</th>
                                <th>Hammersmith</th>
                                <th>Locomotive din 2010 (S7 Stock)</th>
                                <th>7</th>
                                <th>257,391</th>
                                <th>73,000</th>
                                <tH>4,294</tH>
                            </tr>
                            <tr>
                                <th>Hammersmith & City line</th>
                                <th style="background-color: pink; color:black;">Roz</th>
                                <th>1864</th>
                                <th>Ad&#226ncime mic&#259</th>
                                <th>25.5 km</th>
                                <th>Hammersmith</th>
                                <th><p>Barking</br>Parslow</p></th>
                                <th>29</th>
                                <th>Hammersmith</th>
                                <th>Locomotive din 2010 (S7 Stock)</th>
                                <th>7</th>
                                <th>231,193</th>
                                <th>61,000</th>
                                <th>3,860</th>
                            </tr>
                            <tr>
                                <th>Waterloo & City line</th>
                                <th style="background-color: turquoise; color:black;">Turcuaz</th>
                                <th>1898</th>
                                <th>Ad&#226ncime mare</th>
                                <th>2.5 km</th>
                                <th>Bank</th>
                                <th>Waterloo</th>
                                <th>2</th>
                                <th>Waterloo</th>
                                <th>Locomotive din 1992</th>
                                <th>4</th>
                                <th>59,492</th>
                                <th>16,900</th>
                                <th>11,267</th>
                            </tr>
                        </table>
                    </div>
                    <a href="https://en.wikipedia.org/wiki/London_Underground#Lines" class="newssource" target="_blank" style="margin-top: 10px;">Sursa: Wikipedia.org</a>
                </div>
            </div>
            <div class="main" id="infsection3">
                <div class="news" style="margin-top: 50px;">
                    <h2 class="newstext">Extinderi ??i ??mbun??t????iri propuse</h2>
                    <img src="..\EWD\Imagini\inf2.jpg" class="newsimage">
                    <div class="newstext">
                        <h3>Extensii de linii</h3>
                        <h4>Extensia de la Northern line p??n?? la Battersea Power Station</h4>
                        <p>Linia de Nord este extins?? de la Kennington la Battersea Power Station, prin Nine Elms, deservind zonele de dezvoltare Battersea ??i Nine Elms. ??n aprilie 2013, Transport for London a solicitat competen??ele legale ale unui ordin de lege ??i lucr??ri pentru a continua extinderea. Lucr??rile de preg??tire au ??nceput la ??nceputul anului 2015. Principalul tunel a fost finalizat ??n noiembrie 2017, ??ncep??nd cu luna aprilie. Extensia urmeaz?? s?? se deschid?? ??n 2021.</br>Se va prevede o posibil?? extindere viitoare la Clapham Junction, notific??nd London Borough of Wandsworth un curs rezervat ??n parcul Battersea ??i str??zile ulterioare.</p>
                        <h4>Leg&#259tura de la Croxley</h4>
                        <p>Croxley Rail Link presupune redirec??ionarea filialei Watford a liniei metropolitane de la terminalul actual de la Watford, peste o parte a liniei de ramur?? Croxley Green ??n curs de desf????urare p??n?? la Watford Junction, cu sta??ii la Cassiobridge, Watford Vicarage Road ??i Watford High Street (care ??n prezent este doar o parte of London Overground). Finan??area a fost convenit?? ??n decembrie 2011, iar aprobarea final?? pentru extindere a fost dat?? la 24 iulie 2013, cu scopul finaliz??rii p??n?? ??n 2020.</br> ??n 2015, TfL a preluat responsabilitatea pentru proiectarea ??i construirea extinderii de la Consiliul Jude??ean Hertfordshire, iar dup?? lucr??ri detaliate de proiectare a ajuns la concluzia c?? ar fi nevoie de 50 milioane de lire sterline suplimentare. Din noiembrie 2017, proiectul este ??n a??teptare ??n a??teptarea finan????rilor suplimentare.</p>
                        <h4>Extensia de la Bakerloo line p??n?? la Lewisham</h4>
                        <p>??n 1931 a fost aprobat?? extinderea liniei Bakerloo de la Elephant & Castle p??n?? la Camberwell, cu sta??ii la Albany Road ??i un schimb de schimb pe Dealul Danemarcei. Odat?? cu austeritatea postbelic??, planul a fost abandonat. ??n 2006, Ken Livingstone, primarul de atunci al Londrei, a anun??at c??, ??n dou??zeci de ani, Camberwell va avea o sta??ie de metrou. Planurile pentru o extindere de la Elephant & Castle la Lewisham prin Old Kent Road ??i New Cross Gate sunt ??n prezent dezvoltate de Transport for London, cu posibil?? finalizare p??n?? ??n 2029.</p>
                        <h4>Extensia de la Bakerloo line p??n?? la Watford Junction</h4>
                        <p>??n 2007, ca parte a planific??rii transferului liniei de nord a Londrei c??tre ceea ce a devenit London Overground, TfL a propus re-extinderea liniei Bakerloo la Watford Junction.</p>
                        <h4>Extensia de la Central line p??n?? la Uxbridge</h4>
                        <p>London Borough of Hillingdon a propus ca linia central?? s?? fie extins?? de la West Ruislip la Uxbridge, prin Ickenham, sus??in??nd c?? aceasta va reduce traficul pe A40 din zon??.</p>
                        <h4>Extensia Euston p??n?? la Canary Warf line</h4>
                        <p>Potrivit Noului inginer civil, Grupul Canary Wharf a sugerat construirea unei noi linii de cale ferat?? ??ntre Euston ??i Canary Wharf. Propunerea este analizat?? de guvern.</p>
                        <a href="https://en.wikipedia.org/wiki/London_Underground#Proposed_improvements_and_expansions" class="newssource" target="_blank">Sursa: Wikipedia.org</a>
                    </div>
                </div>
            </div>
            </br>
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