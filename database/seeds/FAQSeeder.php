<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            'name' => 'Základné informácie',
            'description' =>
                '<div class="collapse show" id="basic_information">
                    <p>Európsky program Erasmus má dlhoročnú tradíciu. Od akademického roka 2014/2015 existuje
                     ako integrovaný program Erasmus+ pre obdobie rokov 2014 – 2021, ktorý poskytuje široké možnosti
                      mobilít študentov a zamestnancov.</p>
	                
	                <h3>Erasmus+ podporuje 3 kľúčové aktivity:</h3>
	
                    <ul>
                        <li class="item">KA1 = mobility jednotlivcov</li>
                        <li class="item">KA2 = strategické partnerstvá</li>
                        <li class="item">KA3 = reforma politík vrátane programu Jean Monnet a program Šport</li>
                    </ul>
    
                    <p>V rámci kľúčovej aktivity KA1 (Mobility jednotlivcov) Univerzita Konštantína Filozofa v Nitre
                     realizuje mobility štúdium a stáž pre študentov a výučba a školenie pre zamestnancov. 
                     Študenti a zamestnanci majú možnosť uchádzať sa o Erasmus+ mobilitu v niektorej z krajín EÚ a EHP,
                     v prípade schválenia samostatného Erasmus+ projektu UKF aj o mobilitu v rámci krajiny mimo EÚ a EHP priestoru.</p>
                    <h3>Pre Erasmus mobilitu v krajine EÚ alebo EHP (mobility KA103) pozri:</h3>
                    
                    <ul>
                        <li class="item">Študijný pobyt (Student Mobility for Studies)</li>
                        <li class="item">Stáž (Student Mobility for Traineeships)</li>
                        <li class="item">Prednáškový pobyt (Teaching Mobility)</li>
                        <li class="item">Školenie (Staff Training Mobility)</li>
                    </ul>

                    <h3>Pre Erasmus mobilitu v krajine mimo zónu EÚ a EHP (mobility KA107) pozri:</h3>
                
                    <ul>
                        <li class="item">Študijný pobyt (Student Mobility for Studies)</li>
                        <li class="item">Stáž (Student Mobility for Traineeships)</li>
                        <li class="item">Prednáškový pobyt (Teaching Mobility)</li>
                        <li class="item">Školenie (Staff Training Mobility)</li>
                    </ul>
                    
                    <p>Mobility sa realizujú na základe Erasmus+ bilaterálnych dohôd podpísaných s partnerskými
                     vysokoškolskými inštitúciami v zahraničí. Za vypracovanie návrhu Erasmus dohody, výber študentov
                     a zamestnancov na mobilitu a uznanie výsledkov ich mobility zodpovedá katedrový a fakultný koordinátor
                     príslušnej fakulty UKF. Pre účasť na mobilite si stačí vybrať prijímajúcu zahraničnú inštitúciu, založiť
                     prihlášku cez aplikáciu StudyAbroad (týka sa len mobilít KA103), všetky požadované dokumenty odoslať 
                     online cez aplikáciu StudyAbroad, vytlačiť ich, odovzdať katedrovému koordinátorovi a zúčastniť sa 
                     výberového konania na katedre. Termín na prihlasovanie na Erasmus+ mobility je zvyčajne na jar 
                     (hlavný termín) pre mobility plánované na nasledujúci akademický rok, no počas roka sa zvyčajne 
                     vyhlasujú výzvy na dodatočné prihlasovanie.</p>
                    <p>Inšpirujte sa videami účastníkov mobilít Erasmus+, prihláste sa na Erasmus mobilitu
                     a zažite vlastnú výnimočnú medzinárodnú skúsenosť.
                     V prípade záujmu sa môžu študenti UKF zapojiť do mimoškolskej činnosti v rámci dobrovoľníckej
                     študentskej organizácie ESN UKF v Nitre a pomáhať prichádzajúcim zahraničným študentom pri
                     vybavovaní náležitostí k ich pobytu na UKF.</p>
                </div>',
        ]);

        DB::table('faq')->insert([
            'name' => 'Partnerské Univerzity',
            'description' => ''
        ]);

        DB::table('faq')->insert([
            'name' => 'Podmineky účasti',
            'description' => '
                <div class="collapse show" id="conditions">
                    <p>Na mobilitu (študijný pobyt) Erasmus+ sa môže prihlásiť akýkoľvek študent riadne zapísaný
                     v niektorom  študijnom  programe  UKF. Erasmus  študijný  pobyt  nemôže  absolvovať  študent 1.ročníka
                     Bc. štúdia,  ako  prvák  však  môže  založiť  prihlášku  a byť  schválený  na  pobyt v nasledujúcom
                     akademickom roku. Počas štúdia máš možnosť zúčastniť sa Erasmus+ mobility (štúdium  alebo  stáž)
                     v každom  stupni  štúdia  maximálne  po  dobu  12  mesiacov.  Pri  určení nároku na dĺžku Tvojej Erasmus+
                     mobility sa berú do úvahy predchádzajúce mobility v rámci programu LLP/Erasmusi Erasmus+ (aj napr.
                     mobilita cez EÚ projekt Capacity Building apod.)realizované  v rámci  Tvojho  súčasného  stupňa  štúdia.
                     Absolventi,  ktorí  už  ukončili  štúdium a nebudú ďalej pokračovať v štúdiu na UKF, sa nemôžu zúčastniť
                     Erasmus+ študijného pobytu.</p>	

                    <p>Študenti musia uskutočniť svoju mobilitu v krajine inej než je krajina vysielajúcej organizácie
                     (UKF) a krajina, v ktorej má študent ubytovanie počas štúdií.</p>	
                    <h3>Program Erasmus+ umožňuje realizovať  v akad.  roku  2019/2020mobility  len  v rámci týchto krajín: </h3>
                    <ul>
                        <li class="item">28 členských krajín EÚ</li>
                        <li class="item">EZVO/EHP krajiny: Island, Nórsko, Lichtenštajnsko</li>
                        <li class="item">kandidátske krajiny: Turecko, Macedónsko, Srbsko.</li>
                    </ul>
                
                    <p>U mobility štúdium musí existovať Erasmus+ bilaterálna dohoda  medzi  UKF  a vysokoškolskou inštitúciou
                     v zahraničí v jednej  z vyššie  uvedených  krajín. Pri  výbere miesta študijného  pobytu sa orientuj na 
                     tú vysokoškolskú inštitúciu, ktorá má s UKF uzavretú Erasmus+ dohodu  na  tvoj študijný  odbor  a  platnú
                     na  nasledujúci  akademický  rok a ponúka  podobné  alebo  rovnaké predmety Tvojho študijného zamerania
                     ako by si mal mať v danom  semestri  mobility na  UKF. Nie  je  možné  absolvovať  študijný  pobyt  
                     na  vysokoškolskej  inštitúcií,  s ktorou  UKF nemá uzavretú Erasmus+ dohodu. Vybrať si môžeš pobyt 
                     na  1 z 3 vysokoškolských inštitúcií(t.j. v prihláške môžeš uviesť 1 -3 zahraničné školy), pričom
                     katedra Ťa nominuje len na 1 z nich. Celková maximálna kvóta študentov UKF, ktorí môžu byť vyslaní
                     na Erasmus+ študijný pobyt v akademickom roku  2019/2020je 100 študentov.Na základe počtu uzavretých
                     Erasmus+ dohôd je ďalej pre každú fakultu UKF odvodená maximálna kvóta študentov, ktorých môže navrhnúť
                     na Erasmus+ študijný pobyt.</p>
                
                    <p>Katedrový  Erasmus  koordinátor je povinný  vypísať a zrealizovať výberové  konanie(vrátane kritérií výberu) 
                    na obsadenie miest pre  Erasmus+študijný pobyt max. dopočtu miest Erasmus+ programKA103–mobilita jednotlivcov 
                    medzi krajinami programu 3uvedenýchvjednotlivých Erasmus+dohodáchkatedry s partnerskými vysokoškolskými inštitúciami.
                    Podmienky,  ktoré  bude  katedrová  komisia  pri  výbere  posudzovať,  si  stanovuje katedra  sama (najčastejšie  
                    študijný  priemer,  znalosť  cudzieho  jazyka,  úspechy  študenta  na ŠVOČ, reprezentovanie UKF doma/v zahraničí,
                    členstvo vsekcii  ESN  UKF  a  pod.).Výberové konanie  na  študijný  pobyt  musia  absolvovať  všetci  prihlásení
                    študenti,  ktorí pokračujú  do ďalšieho ročníka alebo ďalšieho stupňa štúdia.</p>
                
                    <p>Zoznam všetkých študentov navrhnutých i zamietnutých katedrouna študijný pobyt Erasmus+ na konkrétnu
                     partnerskú inštitúciu vzahraničí uvedie katedra v Zápisnicizvýberového konaniaErasmus,  ktorúkatedra následne
                     vytlačí  a  podpíše. Fakultný  koordinátor  (prodekan  pre medzinárodné  vzťahy) stanoví termín, do ktorého
                     mu katedrový koordinátor  predloží všetky zápisnicespoluspodkladmi navrhnutých  izamietnutých  študentov
                     aich  ďalšími  podkladmi.Fakultný Erasmus koordinátor zápisnice a podklady študentovskontroluje.
                     Na základe údajov zo Zápisníczvýberového konania Erasmus acelkovej kvóty študentov pridelenej
                     pre fakultu zmenív aplikácii stav prihlášok študentov (na stav „akceptovaná“, „akceptovaná–náhradník“alebo
                     „neakceptovaná“)  podľatoho,  či  boli  katedrou  navrhnutí  alebozamietnutí. Podklady všetkých navrhnutých
                     i zamietnutých uchádzačov azápisnicedoručí fakultný koordinátordo 30.04.2019Erasmus koordinátorovi 
                     na Oddelenie  premedzinárodné vzťahy(OMV UKF).OMV si originály týchto dokumentovponecháva pre svoju evidenciu.</p>
                </div>',
        ]);


        DB::table('faq')->insert([
            'name' => 'Výška štipendia',
            'description' => '
                <div class="collapse show" id="amount">
                  <table class="table table-responsive">
                        <thead class="thead-color">
                        <tr>
                            <th>Cieľová krajina</th>
                            <th>Sadzba/mesiac</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Dánsko, Fínsko, Island,  Írsko, Luxembursko, Švédsko, Spojené kráľovstvo, Lichtenštajnsko, Nórsko</td>
                            <td>520€</td>
                        </tr>
                        <tr>
                            <td>Rakúsko,  Belgicko, Nemecko, Francúzsko, Taliansko,  Grécko, Španielsko, Cyprus, Holandsko, Malta, Portugalsko</td>
                            <td>470€</td>
                        </tr>
                        <tr>
                            <td>Bulharsko,  Chorvátsko,  Česká republika, Estónsko,  Litva, Lotyšsko,  Maďarsko, Slovensko,  Slovinsko, Poľsko, Rumunsko, FYROM-Macedónsko, Turecko,Srbsko</td>
                            <td>420€</td>
                        </tr>
                        </tbody>
                     </table>

                    <h3>Študenti poberajúci sociálne štipendium:</h3>
                    <p>Účastníci mobility(štúdium aj stáž)majú nárok naďalší príspevok nad úroveň grantov na štúdium vo výške 150€/mesiac.</p>
                    
                    <h3>Mobility študentov za účelom stáže:</h3>
                    <p>Účastníci mobility majú nárok naďalší príspevok nad úroveň grantov na štúdium vo výške 100€/mesiac.Neplatí 
                    to pre študentov, ktorí poberajú sociálne štipendium</p>
                </div>',
        ]);

        DB::table('faq')->insert([
            'name' => 'Čo vybavyť pred odchodom',
            'description' => '
                <div class="collapse show" id="before_leaving">
                    <p>Pred mobilitou je nevyhnutné vyplniť na prvej strane kontaktné údaje študenta, vysielajúcej 
                    a prijímajúcej inštitúcie. Všetky tri strany musia súhlasiť s časťou vyplnenou pred mobilitou.</p>
                    <p>V prípade, že niektoré administratívne údaje sú už k dispozícií všetkým trom stranám,
                    nie je potrebné ich opakovať v tomto vzore.</p>
                    <p>Väčšina informácií o študentovi, vysielajúcej a prijímajúcej inštitúcii uvedených na strane 1 musí 
                    byť vložená do Mobility Tool+ (v prípade projektov Budovanie kapacít do EACEA Mobility Tool).</p>
             
                    <p>Navrhnutý program mobility obsahuje predbežný mesiac začiatku a konca odsúhlaseného študijného programu,
                    ktorého sa študent zúčastní v zahraničí.</p>
                
                    <p>Zmluva o štúdiu musí zahŕňať všetky predmety, ktoré študent absolvuje v prijímajúcej inštitúcii 
                    (tabuľka A), a takisto musí obsahovať súbor predmetov, ktoré budú na vysielajúcej inštitúcii nahradené 
                    úspešným ukončením študijného programu v zahraničí (tabuľka B). Obidve tabuľky musia byť vyplnené ešte pred
                    mobilitou. Riadky i stĺpce v tabuľkách možno v prípade potreby pridať. V každom prípade ale musia byť obe tabuľky
                    A aj B uvedené samostatne, nemôžu sa zlučovať. Je to z toho dôvodu, aby bolo jasné, že jeden predmet študovaný v 
                    zahraničí nemusí korešpondovať s iným predmetom na vysielajúcej inštitúcii. Cieľom je skôr to, aby skupina vzdelávacích
                    výstupov dosiahnutých v zahraničí nahradila skupinu vzdelávacích výstupov na vysielajúcej inštitúcii bez toho, aby bola
                    nutná zhoda medzi istými modulmi alebo kurzami.</p>
                
                    <p>V krajinách patriacich do Európskeho priestoru vysokoškolského vzdelávania (EHEA) je akademický rok
                    denného štúdia tvorený predmetmi so súhrnným počtom 60 kreditov ECTS. Pre kratšie mobility, ako je jeden
                    celý akademický rok, by predmety mali približne zodpovedať proporcionálnemu počtu kreditov (alebo ekvivalentných
                    jednotiek v krajinách mimo EHEA). Ak študent navštevuje dodatočné predmety nad rámec tých, ktoré vyžaduje 
                    jeho študijný program, tieto dodatočné kredity (alebo ekvivalenty) musia byť tiež uvedené v študijnom programe v tabuľke A.</p>
                
                    <p>Vysielajúca inštitúcia by mala uviesť v tabuľke B skupinu vzdelávacích komponentov, ktoré sa započítavajú
                    do daného stupňa štúdia, ktoré by mal študent za normálnych podmienok absolvovať na vysielajúcej inštitúcii 
                    a ktoré budú nahradené študijným programom na prijímajúcej inštitúcii. Celkový počet ECTS kreditov (alebo ekvivalent)
                    v tabuľke B by mal korešpondovať s celkovým počtom ECTS kreditov (alebo ekvivalent) v tabuľke A. Akákoľvek výnimka
                    z tohto pravidla musí byť jasne uvedená v prílohe k Zmluve o štúdiu a odsúhlasená všetkými stranami. Príklad zdôvodnenia
                    odchýlky medzi celkovým počtom ECTS kreditov (alebo ekvivalent) medzi tabuľkami A a B: napr.: študent už nazbieral 
                    potrebné kredity pre svoj stupeň a nepotrebuje niektoré z kreditov získaných v zahraničí.</p>
                
                    <p>Odporúčaná úroveň hlavného jazyka výučby je uvedená v medziinštitucionálnej zmluve medzi vysielajúcou 
                    a prijímajúcou inštitúciou. Vysielajúca inštitúcia zodpovedá za poskytnutie jazykovej podpory vybraným uchádzačom,
                    aby dosiahli požadovanú jazykovú úroveň do začiatku mobility.</p>
                
                    <p>Úroveň jazykových kompetenciíí v hlavnom jazyku výučby, ktorú sa študent zaväzuje dosiahnúť do začiatku mobility,
                    musí byť zaznamenaná v Zmluve o štúdiu, resp. v Zmluve o poskytnutí finančnej podpory.</p>
                    
                    <p>V prípade, ak vybraný študent nedosahuje stanovenú úroveň v čase podpisu Zmluvy o štúdiu (alebo Zmluvy o poskytnutí
                    finančnej podpory), dohodne sa vysielajúca inštitúcia so študentom na spôsobe nadobudnutia danej úrovne do začiatku mobility.
                    Takisto sa dohodnú na type jazykovej podpory, ktorú poskytne študentovi vysielajúca alebo prijímajúca inštitúcia.</p>
                </div>',
        ]);

        DB::table('faq')->insert([
            'name' => 'Čo odovzdať po návrate',
            'description' => '
                <div class="collapse show" id="returns">
                    <p>Prijímajúca inštitúcia sa zaväzuje poskytnúť vysielajúcej inštitúcii a študentovi Výpis výsledkov 
                    v dobe stanovenej v medziinštitucionálnej dohode (spravidla v dobe nie dlhšej ako 5 týždňov po
                    uverejnení/vyhlásení výsledkov študenta v prijímajúcej inštitúcii). Výpis výsledkov môže odoslať elektronicky
                    alebo iným spôsobom dostupným študentovi a vysielajúcej inštitúcii.</p>
	
                    <p>Výpis výsledkov z prijímajúcej inštitúcie by mal zodpovedať vzdelávacím komponentom odsúhlaseným
                    v tabuľke A, a ak je to relevantné tak v tabuľke A2. Okrem toho by mala byť do Výpisu výsledkov zahrnutá
                    alebo priložená informácia o prideľovaní známok (stačí odkaz na webovú stránku, kde je táto informácia zverejnená).</p>
                    
                    <h3>Aktuálny začiatok a koniec mobility je:</h3>
                
                    <p>Začiatok mobility je prvý deň, kedy študent musí byť prítomný v prijímajúcej inštitúcii. 
                    Môže to byť napríklad začiatok prvého kurzu, uvítacie podujatie organizované prijímajúcou inštitúciou,
                    informačné stretnutie pre študentov so špeciálnymi potrebami, alebo jazykový a interkultúrny kurz; môže to
                    zahŕňať aj jazykový kurz organizovaný alebo poskytovaný inou organizáciou ako prijímajúca inštitúcia 
                    (ak to vysielajúca inštitúcia považuje za relevantnú súčasť mobility v zahraničí).</p>
                
                    <p>Koniec mobility je posledný deň, kedy je študent prítomný v prijímajúcej inštitúcii a nie jeho 
                    aktuálny dátum odchodu. To je napríklad koniec skúškového obdobia, koniec kurzu alebo povinnej osobnej
                    účasti na vyučovaní.</p>
                    
                    <p>Po obdržaní Výpisu výsledkov z prijímajúcej inštitúcie by mala vysielajúca inštitúcia uznať študentovi 
                    úspešne ukončené predmety na prijímajúcej inštitúcii v celkovej výške ECTS kreditov (alebo ekvivalent)
                    uvedených v Tabuľke B (ak je to relevantné tak v tabuľke B2) a započítať ich ako súčasť štúdia bez toho,
                    aby si študent potreboval doplniť ďalšie kurzy alebo skúšky. </p>
                    
                    <p>Ak sa to vyžaduje, vysielajúca inštitúcia prevedie známky, ktoré získal študent v zahraničí,
                    berúc do úvahy informácie o prideľovaní známok z prijímajúcej inštitúcie (pre vysoké školy z krajín
                    programu pozri metodiku popísanú v ECTS príručke užívateľaiv). Európska komisia odporúča používať 
                    na tento účel nástroj EGRACONSv. </p>
                
                    <p>Vysielajúca inštitúcia sa zaväzuje poskytnúť študentovi Výpis výsledkov (tabuľku D) alebo
                    zaznamenať výsledky v databáze dostupnej študentovi, spravidla do 5 týždňov po obdržaní Výpisu 
                    výsledkov z prijímajúcej inštitúcie. </p>
                    
                    <p>Študent bude mať možnosť podať správu o uznaní výsledkov vzdelávania vysielajúcou inštitúciou 
                    prostredníctvom EU survey-u alebo iným dodatočným on-line dotazníkom.</p>
                    
                    <h3>Dodatok k diplomu:</h3>
                    
                    <p>Dodatok k diplomu vydaný vysielajúcou inštitúciou by mal obsahovať informácie obsiahnuté
                    vo Výpise výsledkov z prijímajúcej inštitúcie s presnými názvami predmetov, ktoré študent 
                    absolvoval v zahraničí. Toto platí minimálne pre dodatok k diplomu, ktorý vydáva vysielajúca
                    inštitúcia z krajín programu.</p>
                </div>',
        ]);
    }
}