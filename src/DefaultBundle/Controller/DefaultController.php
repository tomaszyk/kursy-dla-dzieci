<?php

namespace DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use DefaultBundle\Entity\Dzieci;
use DefaultBundle\Entity\Kursy;
use DefaultBundle\Entity\Ceny;
use DefaultBundle\Entity\Daty;
use DefaultBundle\Entity\Wiadomosc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Mpdf\Mpdf;


class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('DefaultBundle:Default:index.html.twig');
    }


    public function dysleksjaAction()
    {
        return $this->render('DefaultBundle:Default:dysleksja.html.twig');
    }


    public function dowodySkutecznosciAction()
    {
        return $this->render('DefaultBundle:Default:dowodySkutecznosci.html.twig');
    }

    //Akcja generuje formularz zapisu na kurs w zależności od przedziału wiekowego kursanta (2-3 klasa lub 4-6)
    public function formularzAction(Request $request, $id, $data)
    {
        $dziecko = new Dzieci();
        
        $session = $request -> getSession();
        
        //Na podstawie id kursu (kurs dla 2-3 klas lub 4-6) pobierane są dane odpowiedniego kursu
        $kurs = $this -> getDoctrine() -> getRepository(Kursy::class) -> find($id);

        $session -> set('kurs', $kurs);
        //Kurs jest dla dzieci z 2-3 klasy
        if($session -> get('kurs') -> getGrupa() == '2-3')
        {
           $form = $this -> createFormBuilder($dziecko)
           //$ pola hidden są wymagane przez system płatności
           -> add('z24_id_sprzedawcy', HiddenType::class, ['data' => 'xxxxx'])
            
            -> add('z24_crc', HiddenType::class, ['data' => '5ebc7348'])
            
            -> add('z24_return_url', HiddenType::class, ['data' => 'http://czytaniedladzieci/dziekuje'])
            
            -> add('z24_language', HiddenType::class, ['data' => 'pl'])

            -> add('k24_nazwa', TextType::class, ['label' => 'Imię i nazwisko opiekuna'])

            -> add('k24_ulica',TextType::class, ['label' => 'Ulica'])

            -> add('k24_numer_dom',TextType::class, ['label' => 'Numer domu'])

            -> add('k24_numer_lok',IntegerType::class, ['label' => 'Numer lokalu'])

            -> add('k24_kod',TextType::class, ['label' => 'Kod Pocztowy'])

            -> add('k24_miasto',TextType::class, ['label' => 'Miasto'])

            -> add('telefon',TextType::class, ['label' => 'Telefon'])

            -> add('k24_email', EmailType::class, ['label' => 'Email'])

            -> add('nazwaDz',TextType::class, ['label' => 'Imię i nazwisko dziecka'])

            -> add('klasa',ChoiceType::class, ['label' => 'Klasa dziecka', 
                                                'choices' => ['2' => '2','3' => '3', '4' => '4' ]])

            -> add('dataUr', DateType::class, ['widget' => 'choice',
                                                'placeholder' => [
                                                'year' => 'Rok', 'month' => 'Miesiąc', 'day' => 'Dzień',], 
                                                'years' => ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013'], 
                                                'format' => 'dd-MM-yyyy','label' => 'Data urodzenia dziecka'])
            //uzytkownik wybiera kurs tylko dla odpowiedniej grupy wiekowej
            -> add('grupa', ChoiceType::class,
                  ['label' => 'Grupa',
                  'choices' => ['GRUPA '.$session -> get('kurs') -> getGrupa().' klasa, '. $session -> get('kurs') -> getDzienigodzina() => $session -> get('kurs') -> getId(),]])

            -> add('uwagi', TextareaType::class, ['label' => 'Uwagi'])

            -> add('polityka', CheckboxType::class, ['label' => 'Zapoznałem/am się z Polityką prywatności zaktualizowaną o zapisy RODO',
                'required' => 'true'])

            -> add('submit', SubmitType::class, ['label' => 'Zapisuję dziecko na kurs'])

            -> getForm();
        }
        
        //Formularz dla kursów 4-6 klasa
        if($session -> get('kurs') -> getGrupa() == '4-6')
        {
           $form = $this -> createFormBuilder($dziecko)
            //$ pola hidden wymagane są przez system płatności
            -> add('z24_id_sprzedawcy', HiddenType::class, ['data' => 'xxxxx'])
            
            -> add('z24_crc', HiddenType::class, ['data' => '5ebc7348'])
            
            -> add('z24_return_url', HiddenType::class, ['data' => 'http://czytaniedladzieci/dziekuje'])
            
            -> add('z24_language', HiddenType::class, ['data' => 'pl'])

            -> add('k24_nazwa', TextType::class, ['label' => 'Imię i nazwisko opiekuna'])

            -> add('k24_ulica', TextType::class, ['label' => 'Ulica'])

            -> add('k24_numer_dom', TextType::class, ['label' => 'Numer domu'])

            -> add('k24_numer_lok', IntegerType::class, ['label' => 'Numer lokalu'])

            -> add('k24_kod', TextType::class, ['label' => 'Kod Pocztowy'])

            -> add('k24_miasto', TextType::class, ['label' => 'Miasto'])

            -> add('telefon', TextType::class, ['label' => 'Telefon'])

            -> add('k24_email', EmailType::class, ['label' => 'Email'])

            -> add('nazwaDz', TextType::class, ['label' => 'Imię i nazwisko dziecka'])

            -> add('klasa', ChoiceType::class, ['label' => 'Klasa dziecka', 
            'choices' => ['4' => '4','5' => '5', '6' => '6']])

            -> add('dataUr', DateType::class, ['widget' => 'choice',
            'placeholder' => ['year' => 'Rok', 'month' => 'Miesiąc', 'day' => 'Dzień',], 
            'years' => ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013'],
            'format' => 'dd-MM-yyyy','label' => 'Data urodzenia dziecka'])

            -> add('grupa', ChoiceType::class,

                  ['label' => 'Grupa',
                  'choices' => ['GRUPA '.$session -> get('kurs') -> getGrupa().' klasa, '. $session -> get('kurs') -> getDzienigodzina() => $session -> get('kurs') -> getId(),]])

            -> add('uwagi', TextareaType::class, ['label' => 'Uwagi'])

            -> add('polityka', CheckboxType::class, ['label' => 'Zapoznałem/am się z Polityką prywatności zaktualizowaną o zapisy RODO',
                'required' => 'true'])

            -> add('submit', SubmitType::class, ['label' => 'Zapisuję dziecko na kurs'])

            -> getForm();
        }
        
            if($request -> isMethod('post'))
            {
                //Pobranie danych z żądania
                $form -> handleRequest($request);
                //Jeżeli są poprawne, zostają przypisane do obiektu dziecko
                if($form->isSubmitted() && $form->isValid())
                {
                    $session -> set('dziecko', $form -> getData());
                
                    return $this -> redirectToRoute('default_place', ['data' => $data]);
                
                }
            }

        return $this -> render('DefaultBundle:Default:formularz.html.twig', ['form' => $form -> createView()]);
    }


    public function placeAction(Request $request)
    {
        $session = $request -> getSession();

        $miasto = $session -> get('dziecko') -> getK24Miasto();
        $opiekun = $session -> get('dziecko') -> getK24Nazwa();
        $Ulica = $session -> get('dziecko') -> getK24Ulica();
        $NrDomu = $session -> get('dziecko') -> getK24NumerDom();
        $NrLokalu = $session -> get('dziecko') -> getK24NumerLok();
        $kodPocztowy = $session -> get('dziecko') -> getK24Kod();
        $email = $session -> get('dziecko') -> getK24Email();

        return $this -> render('DefaultBundle:Default:place.html.twig', ['k24_nazwa' => $opiekun, 'k24_miasto' => $miasto, 'k24_ulica' => $Ulica, 'k24_numer_dom' => $NrDomu, 'k24_numer_lok' => $NrLokalu, 'k24_kod' => $kodPocztowy, 'k24_email' => $email]);
    }

    //Akcja do generowania formularza kontaktowego
    public function kontaktAction(Request $request)
    {
        $wiadomosc = new Wiadomosc();
        //Formularz kontaktowy
        $form1 = $this -> createFormBuilder($wiadomosc)
            ->add('imie',TextType::class, ['label' => 'Imię'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('wiadomosc', TextareaType::class, ['label' => 'Wiadomość'])
            ->add('zgoda', CheckboxType::class, ['label' => '* Wyrażam zgodę na przetwarzanie danych osobowych w celu odpowiedzi na mojego e-maila. Podane dane mogą być wykorzystywane w celach marketingowych, jeśli będzie wymagała tego odpowiedź. W każdym momencie możesz się wypisać. Więcej informacji w Polityce prywatności.', 'required' => true])
            ->add('submit', SubmitType::class, ['label' => 'Wyślij wiadomość'])
            ->getForm();
        
         $session = $request -> getSession();
         $session -> set('recaptcha', '');
        
                //Pobranie danych z żądania
                $form1 -> handleRequest($request);
        
                if($form1 -> isValid() && $form1 -> isSubmitted())
                { 
                    //Zapis danych z formularza do obiektu kontakt
                    $session -> set('kontakt', $form1 -> getData());
                    //Pobranie danych z formularza
                    $imie = $form1 -> get('imie') -> getData();
                    $email = $form1 -> get('email') -> getData();
                    $wiadomosc = $form1 -> get('wiadomosc') -> getData();
                    // $zgoda = $form1 -> get('zgoda') -> getData();
                    
                    //Captcha
                    $sprawdz = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf66YkUAAAAAJ9WdbtzGmlGatgV0CZ_lWmhsah5&response=".$_POST['g-recaptcha-response']);
        
                    $odpowiedz = json_decode($sprawdz);
                    //Jeżeli pole recaptcha nie jest zaznaczone
                    if($odpowiedz -> success == false)
                    {
                    
                        $session -> set('recaptcha', 'Potwierdz, że nie jesteś robotem');
                        //Użytkownik dostaje odpowiedni komunikat
                        return $this->render('DefaultBundle:Default:kontakt.html.twig', ['form'=> $form1 -> createView(), 'recaptcha' => $session -> get('recaptcha')]);
                    }
                    //W przeciwnym wypadku dostaje komunikat, że wszystko przebiegło prawidłowo
                    //routa default_wiadomosc wywoła akcję wiadomość, która prześle dane z formularza na wskazany adres
                    return new RedirectResponse($this->generateUrl('default_wiadomosc', ['imie' => $imie,'email' => $email, 'wiadomosc' => $wiadomosc]));

                }

        return $this->render('DefaultBundle:Default:kontakt.html.twig', ['form'=> $form1 -> createView(), 'recaptcha' => $session -> get('recaptcha')]);
    }
    //Akcja po zapise na kurs generuje plikpdf z umową, zapisuje kursanta do bazy danych oraz wysyła email z potwierdzeniem
    public function dziekujemyAction(Request $request)
    {
        $session = $request -> getSession();
        //Dane potrzebne do wygenerowania umowy
        $opiekun = $session -> get('dziecko') -> getK24Nazwa();
        $Ulica = $session -> get('dziecko') -> getK24Ulica();
        $NrDomu = $session -> get('dziecko') -> getK24NumerDom();
        $NrLokalu = $session -> get('dziecko') -> getK24NumerLok();
        $telefon = $session -> get('dziecko') -> getTelefon();
        $email = $session -> get('dziecko') -> getK24Email();
        $nazwaDz = $session -> get('dziecko') -> getNazwaDz();
        $klasa = $session -> get('dziecko') -> getKlasa();
        $kodPocztowy = $session -> get('dziecko') -> getK24Kod();
        $miasto = $session -> get('dziecko') -> getK24Miasto();
        $grupa = $session -> get('dziecko') -> getGrupa();

        //Zwiększanie ilości kursantów w grupie
        $em = $this -> getDoctrine() -> getManager();

        $polaczenie = $this -> getDoctrine() -> getRepository(Kursy::class) -> findOneBy(['id' => $grupa]);
 
        $liczbaKursantow = $polaczenie ->getLiczbakursantow();

        ++$liczbaKursantow;

        $polaczenie -> setLiczbakursantow($liczbaKursantow);
 
        $em -> flush(); 

        // generowanie pliku pdf z umową 
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($this->render('DefaultBundle:Default:umowa.html.twig', ['opiekun' => $opiekun, 'Ulica' => $Ulica, 'NrDomu' => $NrDomu, 'NrLokalu' => $NrLokalu, 'kodPocztowy' => $kodPocztowy, 'miasto' => $miasto, 'telefon' => $telefon, 'email' => $email, 'nazwaDz' => $nazwaDz, 'klasa' => $klasa, 'grupa' => $grupa, 'polaczenie' => $polaczenie, 'data' => $session -> get('data_promocji') ]));

        $mpdf->Output('../app/umowy/Umowa kursu - '.$opiekun.'.pdf');

        // zapis kursanta do bazy
        $entityManager = $this -> getDoctrine() -> getManager();
        $entityManager -> persist($session -> get('dziecko'));
        $entityManager -> flush();


        // wysyłka maila

        $message = (new \Swift_Message('Potwierdzenie miejsca na kursie "Lepiej się uczę, szybko czytam"'));

        $message -> setFrom('poznan@szybkieczytanie-poznan.pl')
            -> setTo($email)
            -> addPart('

        <p>Witaj '.$opiekun.',</p>
        <p>Cieszę się, że zainteresował Ciebie nasz kurs. W załączniku znajduje się wzór naszej umowy o udział w kursie. Plik jest do wglądu, proszę nie drukować umowy.  Na pierwszych  zajęciach otrzymasz dwa egzemplarze do podpisu, jeden będzie dla Ciebie a drugi dla szkoły. Gdyby pojawiły się jakieś wątpliwości, zachęcam do kontktu. Zapraszam na pierwsze spotkanie '.$session -> get('kurs') -> getPoczatekkursu().' godz. '.$session -> get('kurs') -> getDzienigodzina().', lokalizacja to '.$session -> get('kurs') -> getAdres().', '.$session -> get('kurs') -> getNazwa().'.</p>
        --

        <p>Pozdrawiam<br>
        Tomasz Mlastek<br>
        EDU Poznań<br>
        Tel. 787 620 114<br>
        E-mail: poznan@akademiaedukacji.pl<br>
        www.szybkieczytanie-poznan.pl<br>
        www.czytaniedladzieci.pl</p>', 'text/html'

        )  // załącznik pdf wygenerowany powyżej
        ->attach(\Swift_Attachment::fromPath('../app/umowy/Umowa kursu - '.$opiekun.'.pdf'));
        $this->get('mailer')->send($message);


        return $this->render('DefaultBundle:Default:dziekujemy.html.twig');
    }

//
    public function regulaminAction()
    {
        return $this->render('DefaultkBundle:Default:regulamin.html.twig');
    }


    public function programNauczaniaAction()
    {
        return $this->render('DefaultBundle:Default:programNauczania.html.twig');
    }

    //Akcja prezentuje użytkownikowi do jakich grup może zapisać dziecko
    public function zapisyAction()
    {
        $kursy = $this -> getDoctrine() -> getRepository(kursy::class) -> findAll();

        return $this->render('DefaultBundle:Default:zapisy.html.twig', ['kursy' => $kursy]);
    }
    
    //Akcja przesyła dane z formularza kontaktowego do wskazanej skrzynki pocztowej
    public function wiadomoscAction($imie, $email, $wiadomosc)
    {
          $message = (new \Swift_Message('Wiadomość za strony czytaniedladzieci.pl'));

          $message -> setFrom('poznan@szybkieczytanie-poznan.pl')
                    -> setTo('poznan@szybkieczytanie-poznan.pl')
                    -> setBody('wiadomość od '. $imie.' email '.$email.' treść to '.$wiadomosc);

           $this->get('mailer')->send($message);

        return $this->render('DefaultBundle:Default:wiadomosc.html.twig');
    }
    //Akcja pokazuje szczegółowe dane wybranej grupy (zależnie od id)
    //Termin rozpoczęcia kursu, lokalizację oraz aktualną cenę promocyjną
    public function szczegolyAction($id, Request $request)
    {
        //sprawdzenie aktualnego czasu
        $czas = time();
        
        //Przedziały czasowe, w których obowiązuje określona cena
        $data = $this -> getDoctrine() -> getRepository(Daty::class) -> findOneById(1);

        //Wybrany przez uzytkownika kurs (akcja zapisy)
        $kurs = $this -> getDoctrine() -> getRepository(Kursy::class) -> find($id);
        
        //Sprawdzenie, w jakim przedziale czasowym użytkownik przegląda stronę
        //na tej podstawie pobierana jest z bazy odpowiednia cena promocyjna
        //oraz do zmiennej data_promocji przypisana zostaje data zakończenia aktualnej promocji cenowej
        if($czas < mktime( 0, 0, 0, $data -> getPierM(), $data -> getPierD(), $data -> getPierR()))
            {
                $id_cena = 11;
                $polaczenie = $this -> getDoctrine() -> getRepository(Ceny::class) -> findOneBy(['id' => $id_cena]);
                
                $data_promocji = $data -> getPierD().'.'.$data -> getPierM().'.'.$data -> getPierR();
            }
        
        elseif( $czas > mktime( 0, 0, 0, $data -> getPierM(), $data -> getPierD(), $data -> getPierR()) &&
            $czas < mktime( 0, 0, 0, $data -> getDrugiM(), $data -> getDrugiD(), $data -> getDrugiR()) )
            {
                $id_cena = 12;
                $polaczenie = $this -> getDoctrine() -> getRepository(Ceny::class) -> findOneBy(['id' => $id_cena]);
                
                $data_promocji = $data -> getDrugiD().'.'.$data -> getDrugiM().'.'.$data -> getDrugiR();
            }
        
        elseif( $czas > mktime( 0, 0, 0, $data -> getDrugiM(), $data -> getDrugiD(), $data -> getDrugiR()) &&
             $czas < mktime( 0, 0, 0, $data -> getTrzeciM(), $data -> getTrzeciD(),  $data -> getTrzeciR()) )
            {
                $id_cena = 13;
                $polaczenie = $this -> getDoctrine() -> getRepository(Ceny::class) -> findOneBy(['id' => $id_cena]);
                
                $data_promocji = $data -> getTrzeciD().'.'.$data -> getTrzeciM().'.'.$data -> getTrzeciR();
            }
        
            $session = $request -> getSession();
            $session -> set('data_promocji', $data_promocji);
        
        return $this -> render('DefaultBundle:Default:szczegoly.html.twig', ['id_cena' => $id_cena, 'polaczenie' => $polaczenie, 'kurs' => $kurs, 'data_promocji' => $data_promocji]);
    }

}
