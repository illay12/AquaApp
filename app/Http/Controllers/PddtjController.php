<?php

namespace App\Http\Controllers;

use App\Models\ComunicatPddtj;

class PddtjController extends Controller
{
    /**
     * Prezentare — pagina principală a microsite-ului
     * GET /
     */
    public function prezentare()
    {
        return view('pddtj.prezentare');
    }

    /**
     * Prezentare » Despre PDDTJ
     * GET /prezentare/despre-pddtj
     */
    public function desprePddtj()
    {
        return view('pddtj.despre-pddtj');
    }

    /**
     * Prezentare » Despre proiect
     * GET /prezentare/despre-proiect
     */
    public function despreProiect()
    {
        return view('pddtj.despre-proiect');
    }

    /**
     * Contracte — Lucrări / Servicii / Furnizare
     * GET /contracte
     */
    public function contracte()
    {
        return view('pddtj.contracte', $this->contracteData());
    }

    /**
     * Detaliu contract individual (CL-1, CS-2, CF-2 etc.)
     * GET /contracte/detaliu/{cod}
     */
    public function contractDetaliu(string $cod)
    {
        $data = $this->contracteData();

        $tipuri = [
            'lucrari'   => ['lista' => $data['lucrari'],   'label' => 'Contract de lucrări',  'ancora' => 'lucrari'],
            'servicii'  => ['lista' => $data['servicii'],  'label' => 'Contract de servicii', 'ancora' => 'servicii'],
            'furnizare' => ['lista' => $data['furnizare'], 'label' => 'Contract de furnizare', 'ancora' => 'furnizare'],
        ];

        foreach ($tipuri as $tip) {
            foreach ($tip['lista'] as $contract) {
                if (strtolower($contract['cod']) === strtolower($cod)) {
                    return view('pddtj.contract-detaliu', [
                        'contract'    => $contract,
                        'tipLabel'    => $tip['label'],
                        'tipAncora'   => $tip['ancora'],
                    ]);
                }
            }
        }

        abort(404);
    }

    /**
     * Datele contractelor PDDTJ (Lucrări / Servicii / Furnizare), folosite atât
     * de pagina listă (contracte) cât și de pagina de detaliu per contract.
     */
    private function contracteData(): array
    {
        $lucrari = [
            [
                'cod' => 'CL-1',
                'titlu' => 'Reabilitarea captărilor din Tulcea și Mahmudia',
                'valoare' => '30.953.720,62 lei fără TVA',
                'contractor' => 'S.C. CORAL S.R.L. Tulcea',
                'data' => '15.12.2023',
                'durata' => '610 zile de la data emiterii Ordinului Administrativ de începere, din care 183 zile proiectare și 427 zile execuție',
                'obiectiv' => 'Lucrări de proiectare și execuție pentru reabilitarea captărilor de apă brută din Tulcea și Mahmudia.',
                'texte' => [
                    'Valoarea contractului este de 30.953.720,62 lei, exclusiv TVA și a fost semnat în data de 15.12.2023.',
                    'În urma procedurii de achiziție publică pentru atribuirea contractului CL1, oferta câștigătoare a fost atribuită S.C. CORAL S.R.L. Tulcea. Contractul are o durată de 610 zile de la data emiterii Ordinului Administrativ de începere din care 183 zile de proiectare și 427 zile execuție.',
                    'Prin acest contract vor fi asigurate lucrări de proiectare și execuție pentru următoarele categorii de lucrări:',
                ],
                'grupe' => [
                    ['titlu' => 'Reabilitare captări Tulcea', 'items' => [
                        'Captare Milă 42+500',
                        'Reabilitare instalații hidraulice aferente criburi și montare sistem de semnalizare cu balize luminoase',
                        'Reabilitarea camerelor de vane pe conductele de aspirație apă brută – 4 unități',
                    ]],
                    ['titlu' => 'Reabilitare stație de pompare apă brută', 'items' => [
                        'Reabilitare clădire',
                        'Înlocuire pod rulant',
                        'Înlocuire pompe de apă brută',
                        'Înlocuire pompe epuisment',
                        'Înlocuire instalație hidraulică',
                        'Înlocuire instalație electrică',
                        'Furnizare și instalare generator electric de urgență',
                        'Lucrări de amenajare incintă (reabilitare dig de protecție, sistem de drenaj ape pluviale, împrejmuire zonă de protecție sanitară)',
                        'Reabilitarea camerelor de vane pe conductele de refulare apă brută – 4 unități',
                        'Reabilitare linie electrică de alimentare captare',
                        'Lucrări electrice la captare',
                        'Reabilitare cămine existente pe firul 2 al conductei de aducțiune – 11 unități',
                    ]],
                    ['titlu' => 'Reabilitare drum de acces', 'items' => [
                        'Supraînălțare dig de protecție pe distanță de 1,7 km de la captare până în zona canalului deschis numită „7 țevi”',
                        'Refacerea integrală a carosabilului drumului de acces – dale de beton, pe distanță de 3,9 km',
                        'Integrare captare în SCADA',
                    ]],
                    ['titlu' => 'Front captare Bogza', 'items' => [
                        'Reabilitare post de transformare',
                    ]],
                    ['titlu' => 'Reabilitare captări Mahmudia', 'items' => [
                        'Reabilitare stație de pompare apă brută',
                        'Reabilitare clădire',
                        'Montare balize la captare',
                        'Integrare captare în SCADA',
                    ]],
                ],
                'status' => 'Semnat · în implementare',
            ],
            [
                'cod' => 'CL-4',
                'titlu' => 'Extinderea și reabilitarea captărilor, stațiilor de tratare și complexelor de înmagazinare – pompare din Carcaliu și Babadag',
                'valoare' => '37.983.376,20 lei fără TVA',
                'contractor' => 'S.C. CORAL S.R.L. Tulcea',
                'data' => '31.01.2024',
                'durata' => '610 zile de la data emiterii Ordinului Administrativ de Începere, din care 180 zile proiectare și 430 zile execuție',
                'obiectiv' => 'Lucrări de proiectare și execuție pentru extinderea și reabilitarea captărilor, stațiilor de tratare și complexelor de înmagazinare-pompare din Carcaliu și Babadag.',
                'texte' => [
                    'Contractul a fost semnat în data de 31.01.2024. În urma procedurii de achiziție publică pentru atribuirea contractului CL4, oferta câștigătoare a fost atribuită S.C. CORAL S.R.L. Tulcea, cu o valoare totală de 37.983.376,20 lei (exclusiv TVA) și o durată de 610 zile de la data emiterii Ordinului Administrativ de Începere, din care 180 zile proiectare și 430 zile execuție.',
                    'Prin acest contract vor fi asigurate următoarele lucrări de proiectare și execuție:',
                ],
                'grupe' => [
                    ['titlu' => 'Localitatea Carcaliu', 'items' => [
                        'Reabilitare și extindere front captare',
                        'Realizare 1 foraj nou',
                        'Realizare aducțiune nouă apă brută',
                        'Reabilitare 2 foraje existente',
                        'Sistem de monitorizare CCTV și sistem antiefracție',
                        'Integrare în SCADA',
                        'Reabilitare gospodărie de apă Carcaliu',
                        'Înlocuire rezervor existent',
                        'Instalație nouă dezinfecție',
                        'Clădire administrativă nouă',
                        'Dispecerat local SCADA',
                        'Laborator calitate apă potabilă',
                        'Furnizare și instalare generator electric de urgență',
                    ]],
                    ['titlu' => 'Localitatea Babadag', 'items' => [
                        'Reabilitare front captare',
                        'Reabilitare 10 foraje existente',
                        'Reabilitare rezervor tampon apă brută',
                        'Reabilitare stație de pompare apă brută',
                        'Sistem de monitorizare CCTV și sistem antiefracție',
                        'Instalație nouă dezinfecție',
                        'Laborator calitate apă potabilă',
                        'Furnizare și instalare generator electric de urgență',
                        'Integrare în SCADA',
                        'Reabilitare aducțiuni de apă brută',
                        'Înlocuire aducțiuni de apă brută',
                        'Echipare cu vane de secționare cu acționare electrică și puncte de monitorizare presiune',
                        'Reabilitare rezervoare existente – Complex de înmagazinare-pompare Zahăr',
                        'Reabilitare rezervoare',
                        'Reabilitare stație de pompare apă potabilă',
                        'Instalație nouă dezinfecție',
                        'Furnizare și instalare generator electric de urgență',
                        'Reabilitare rezervoare existente – complex de înmagazinare Carierei',
                        'Reabilitare rezervoare',
                        'Alimentare cu energie electrică',
                        'Instalație nouă dezinfecție',
                        'Furnizare și instalare generator electric de urgență',
                        'Reabilitare rezervoare existente – Complex de înmagazinare-pompare Cabanei',
                        'Reabilitare rezervoare',
                        'Reabilitare stație de pompare apă potabilă',
                        'Instalație nouă dezinfecție',
                        'Furnizare și instalare generator electric de urgență',
                        'Reabilitare rezervoare existente – Complex de înmagazinare Pădure',
                        'Reabilitare rezervoare',
                        'Alimentare cu energie electrică',
                        'Punere în funcțiune cuvă existentă nefuncțională',
                        'Instalație nouă dezinfecție',
                        'Furnizare și instalare generator electric de urgență',
                        'Reabilitare rezervoare existente – Complex de înmagazinare Ferme',
                        'Reabilitare rezervoare',
                        'Alimentare cu energie electrică',
                        'Instalație nouă dezinfecție',
                        'Furnizare și instalare generator electric de urgență',
                    ]],
                    ['titlu' => 'Dispecerat SCADA local', 'items' => [
                        'Dispecerat local SCADA – Apă Babadag, în compartimentul alocat în SE Babadag',
                    ]],
                ],
                'status' => 'Semnat · în implementare',
            ],
            [
                'cod' => 'CL-8',
                'titlu' => 'Stație nouă de epurare în localitatea Chilia Veche. Extindere (completare) stație de epurare în Sulina',
                'valoare' => '17.694.733,16 lei fără TVA',
                'contractor' => 'Asocierea S.C. NESS PROIECT EUROPE S.R.L. (lider) – S.C. I.G.U.T S.R.L. (asociat)',
                'data' => '23.05.2023',
                'durata' => '17 luni (6 luni proiectare + 11 luni execuție) de la data emiterii ordinului administrativ de începere',
                'obiectiv' => 'Extinderea și modernizarea infrastructurii publice de alimentare cu apă și de canalizare, pentru creșterea gradului de acces al populației la servicii sigure din punct de vedere calitativ și cantitativ, cu protejarea mediului și a resurselor de apă.',
                'texte' => [
                    'Contractul are o valoare de 17.694.733,16 lei fără TVA și a fost semnat în data de 23.05.2023. Acesta contract de tip proiectare și execuție a fost atribuit Asocierii S.C. NESS PROIECT EUROPE S.R.L. (lider) – S.C. I.G.U.T S.R.L. (asociat), iar durata preconizată de execuție a lucrărilor este de 17 luni (6 luni proiectare și 11 luni execuție) de la data emiterii ordinului administrativ de începere.',
                    'În cadrul contractului sunt propuse lucrări în treapta de epurare biologică pentru ambele stații de epurare.',
                    'În Aglomerarea Chilia Veche se vor realiza următoarele investiții:',
                ],
                'grupe' => [
                    ['titlu' => 'Stație de epurare nouă', 'items' => [
                        'Stație automată recepție vidanje',
                        'Stație completă de epurare mecanică și epurare biologică și prelucrare a nămolului în filtre plantate cu stuf',
                        'Laborator apă uzată',
                        'Dispecerat local SCADA',
                        'Realizare foraje de observație în incintă',
                        'Conductă nouă descărcare efluent',
                        'Furnizare și instalare generator electric de urgență',
                        'Furnizare și instalare sistem de panouri fotovoltaice',
                    ]],
                    ['titlu' => 'Pentru Aglomerarea Sulina — stație existentă de epurare (completare)', 'items' => [
                        'Stație automată recepție vidanje',
                        'Punct de monitorizare calitate influent',
                        'Sistem de dezinfecție pentru efluent',
                        'Punct de monitorizare debit efluent',
                        'Completare dotări laborator apă uzată',
                        'Realizare foraje de observație în incintă',
                        'Dispecerat local SCADA',
                        'Platforme noi depozitare nămol deshidratat',
                        'Furnizare și instalare sistem de panouri fotovoltaice',
                    ]],
                ],
                'texte_final' => [
                    'Pentru stația de epurare Chilia Veche se va avea în vedere utilizarea tehnologiei de epurare biologică în filtre plantate cu stuf. Toate investițiile pentru epurarea biologică se vor realiza în incinta amplasamentului alocat de autoritățile locale, existând spațiul necesar pentru toate componentele necesare noii stații de epurare.',
                    'Pentru stația de epurare Sulina nu se proiectează obiecte tehnologice de proces biologic noi, cele existente având o capacitate suficientă. Se completează cu componentele care lipsesc.',
                    'Echipamentele vor fi dotate cu software-ul adecvat ce va permite integrarea în sistemul SCADA al stațiilor, înregistrarea, vizualizarea și exploatarea datelor de interes. Investițiile care se vor realiza în ambele stații de epurare în zona nămolului, în cadrul acestui contract, sunt platformele de depozitare temporară a nămolului deshidratat.',
                    'Obiectivul principal al măsurii de investiții îl reprezintă extinderea și modernizarea infrastructurii publice de alimentare cu apă și de canalizare, în scopul creșterii gradului de acces a populației la servicii sigure din punct de vedere calitativ și cantitativ, în condiții de ocrotire a mediului înconjurător și protejare a resurselor de apă.',
                ],
                'status' => 'Semnat · în implementare',
            ],
            [
                'cod' => 'CL-10',
                'titlu' => 'Extinderea și reabilitarea sistemului de alimentare cu apă și a sistemului de colectare a apelor uzate menajere din Tulcea (zona centrală)',
                'valoare' => '60.935.705,84 lei fără TVA',
                'contractor' => 'Asocierea S.C. NESS PROIECT EUROPE S.R.L. (lider) – CONSORZIO STABILE EBG GROUP (asociat)',
                'data' => '09.11.2022',
                'durata' => '20 de luni de la data ordinului administrativ privind începerea lucrărilor',
                'obiectiv' => 'Extinderea și reabilitarea sistemului de alimentare cu apă și a sistemului de colectare a apelor uzate menajere în zone din intravilanul municipiului Tulcea.',
                'texte' => [
                    'Contractul are o valoare 60.935.705,84 lei fără TVA și a fost semnat în data de 09.11.2022. Acesta a fost atribuit asocierii S.C. NESS PROIECT EUROPE S.R.L. (lider) – CONSORZIO STABILE EBG GROUP (asociat), iar durata preconizată de execuție a lucrărilor este de 20 de luni de la data ordinului administrativ privind data de începere a lucrărilor.',
                    'Lucrările care se vor executa prin acest contract se desfășoară în zone din intravilanul localității Tulcea.',
                    'Prin contract se va asigura execuția următoarelor lucrări:',
                ],
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Înlocuire rețea de distribuție existentă pe 37 de străzi din Municipiul Tulcea – 9.784 m de conducte',
                        'Extindere rețea de distribuție pe 3 străzi din Municipiul Tulcea – 317 m conducte',
                        'Instalare în 14 puncte de monitorizare a debitului în rețeaua de distribuție',
                        'Instalarea a 5 vane de reducere a presiunii în rețeaua de distribuție',
                        'Execuție stație de pompare a apei potabile (inclusiv a conectărilor la infrastructura existentă)',
                        'Achiziționare 5 terminale pentru citirea contoarelor și a aplicației software aferentă acestora',
                        'Înlocuire rețea de canalizare existentă pe 34 de străzi din Municipiul Tulcea – 11.204 m de înlocuire de conducte',
                        'Extindere rețea de canalizare pe 5 străzi din Municipiul Tulcea – 515 m conducte de canalizare',
                        'Execuție stație nouă de pompare apă uzată (inclusiv conectarea la infrastructura existentă) și conducta de refulare aferentă',
                        'Reabilitarea a 4 stații de pompare a apei uzate existente',
                        'Înlocuire conductă de refulare aferentă SP 4',
                        'Reconfigurarea unui colector de apă uzată menajeră prin conectarea la infrastructura existentă',
                        'Integrarea în SCADA a 24 de stații de pompare apă uzată existentă',
                    ]],
                ],
                'texte_final' => [
                    'Semnarea contractului pentru extinderea și reabilitarea sistemului de alimentare cu apă și de canalizare reprezintă un demers concret în susținerea investițiilor planificate pentru județul Tulcea, care vizează îmbunătățirea infrastructurii de tratare și epurare a apelor uzate, îmbunătățirea calității mediului prin reducerea riscului de poluare a solului și a apelor de suprafață, precum și îmbunătățirea condițiilor de viață a comunităților din aria de proiect.',
                    'Autorizație de construire nr. 93 din 22.06.2023.',
                ],
                'status' => 'Autorizație de construire nr. 93 din 22.06.2023 · în implementare',
            ],
            [
                'cod' => 'CL-5',
                'titlu' => 'TL-CL-05: Extinderea și reabilitarea captărilor de apă, stațiilor de tratare și rezervoarelor de înmagazinare în Sulina, Crișan și Mila 23',
                'valoare' => '39.900.000 lei fără TVA',
                'contractor' => 'Asocierea S.C. DINAMIC CONSTRUCT S.R.L. (lider ofertant) – S.C. GAZ CONTROL S.R.L. (ofertant), cu ALLPLAN PROIECT (subcontractant) și ARCIF AG, S.C. ARCON AG (terți susținători)',
                'data' => '16.07.2026',
                'durata' => '24 luni de la ordinul administrativ de începere, din care 6 luni proiectare',
                'obiectiv' => 'Extinderea și reabilitarea surselor de apă, stațiilor de tratare și rezervoarelor de înmagazinare din Sulina, Crișan și Mila 23.',
                'texte' => [
                    'Contract nou, specific PDDTJ 2021-2027 (nu are corespondent pe microsite-ul POIM). Extinderea și reabilitarea surselor de apă, stațiilor de tratare și rezervoarelor de înmagazinare din Sulina, Crișan și Mila 23:',
                ],
                'grupe' => [
                    ['titlu' => 'Obiect 1 — Sistem de alimentare cu apă Sulina', 'items' => [
                        'Reabilitare sursă existentă și zonă de protecție sanitară Sulina',
                        'Dotări stație pompare apă brută existentă (în incinta GA Sulina)',
                        'Reabilitare stație de tratare (Qic = 18 l/s)',
                        'Extindere rezervoare de înmagazinare / reabilitare filtre lente (V = 4 × 240 mc)',
                    ]],
                    ['titlu' => 'Obiect 2 — Sistem de alimentare cu apă Crișan', 'items' => [
                        'Reabilitare captare cu crib și zonă de protecție sanitară Crișan',
                        'Reabilitare conductă de aducțiune apă brută',
                        'Stație de pompare apă brută nouă (în incinta GA Crișan)',
                        'Stație de tratare nouă (Qic = 8 l/s), rezervor nou (V = 450 mc)',
                        'Stație de pompare nouă pentru distribuție',
                    ]],
                    ['titlu' => 'Obiect 3 — Sistem de alimentare cu apă Mila 23', 'items' => [
                        'Reabilitare captare cu crib și zonă de protecție sanitară Mila 23',
                        'Realizare ponton de acostare',
                        'Reabilitare conductă de aducțiune și stație de pompare apă brută',
                        'Reabilitare stație de tratare (Qic = 6 l/s)',
                        'Rezervoare de înmagazinare noi (V = 2 × 250 mc) și stație de pompare nouă pentru distribuție',
                    ]],
                ],
                'status' => 'Semnat · detalii suplimentare în curs de actualizare',
                'nou' => true,
            ],
        ];

        $servicii = [
            [
                'cod' => 'CS-1',
                'titlu' => 'Asistență tehnică și supervizare, inclusiv publicitate',
                'valoare' => '22.743.012,68 lei fără TVA',
                'contractor' => 'Asocierea TADECO CONSULTING – Resourcing Environmental Consulting – Romanian Soft Company',
                'data' => '09.11.2022',
                'durata' => '62 de luni de la data emiterii ordinului administrativ de începere',
                'obiectiv' => 'Servicii de management și suport pentru Unitatea de Implementare a Proiectului și pentru Beneficiarul Aquaserv S.A. Tulcea, în vederea implementării în bune condiții a proiectului.',
                'texte' => [
                    'Contractul de servicii de Asistență tehnică și supervizare, inclusiv publicitate, pentru proiectul „Proiectul Regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea”, a fost semnat în data de 09.11.2022 și atribuit în urma licitației, asocierii formate din TADECO CONSULTING – Resourcing Environmental Consulting – Romanian Soft Company și are o valoare de 22.743.012,68 lei fără TVA. Durata contractului este de 62 de luni de la data emiterii ordinului administrativ de începere.',
                    'Durata serviciilor de supervizare va acoperi în totalitate durata proiectării și durata de execuție a lucrărilor din cadrul contractelor de lucrări, plus perioada de garanție. Supervizorul are obligația de a-și adapta programul, respectiv numărul de zile de activitate pentru experții săi, în funcție de stadiul lucrărilor, și în consecință în funcție de tipul de servicii ce trebuie prestate.',
                    'Obiectivul general al contractului de servicii: prin contractul de servicii de asistență tehnică și supervizare, inclusiv publicitate, Consultantul va furniza servicii de management și suport pentru Unitatea de Implementare a Proiectului și pentru Beneficiarul Aquaserv S.A. Tulcea, în vederea implementării în bune condiții a „Proiectului regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea”, astfel încât obiectivele asumate de către OR prin Contractul de finanțare să fie atinse în limitele de timp și de buget aprobate.',
                ],
                'grupe' => [
                    ['titlu' => 'Obiectivele specifice ale contractului de servicii de asistență tehnică', 'items' => [
                        'Acordarea de sprijin calificat și eficient Operatorului Regional Aquaserv S.A. Tulcea în managementul „Proiectului regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea”, urmărind implementarea cu succes a acestuia conform prevederilor Contractului de Finanțare',
                        'Asigurarea publicității și promovării adecvate a măsurii, în vederea informării corecte a populației cu privire la lucrările de construcție și obiectivele propuse în Proiect, conform Manualului de Identitate Vizuală pentru Instrumentele Structurale 2014-2020 în România',
                        'Actualizarea și completarea modelării hidraulice a rețelelor de apă/canal în aria Proiectului',
                        'Asigurarea de sprijin pentru Operatorul Regional în implementarea sistemului GIS la nivelul întregii arii a Proiectului',
                        'Asigurarea condițiilor pentru gestionarea prin sisteme de management moderne și eficiente a rețelelor de apă și de canalizare din cadrul localităților și a aglomerărilor vizate de Proiect',
                        'Asigurarea implementării optime a contractelor de lucrări',
                        'Actualizarea strategiei de management al nămolului rezultat din procesul tehnologic al stațiilor de tratare apă și al stațiilor de epurare',
                        'Actualizarea strategiei și a planului de acțiune privind managementul apelor uzate industriale',
                        'Asigurarea suportului necesar Unității de Implementare a Proiectului privind implementarea programului de investiții curent și a programului de investiții pe termen mediu și lung',
                        'Actualizarea Devizului general, inclusiv a documentelor conexe și a analizei Cost-Beneficiu, ori de câte ori situația o impune',
                        'Asigurarea condițiilor pentru aplicarea Directivei privind apa potabilă, protecția surselor de apă, managementul schimbărilor climatice și al pierderilor de apă în rețea, în conformitate cu activitățile și rezultatele așteptate',
                    ]],
                    ['titlu' => 'Obiectivele activităților de asistență tehnică pentru supervizarea lucrărilor Proiectului', 'items' => [
                        'Îndeplinirea rolului de Supervizor (Inginer cf. FIDIC) pentru contractele de lucrări din cadrul Proiectului, fără a se limita la activitatea de supervizare a execuției',
                        'Asigurarea finalizării Lucrărilor conform prevederilor contractelor de lucrări încheiate între Entitatea Contractantă (OR Aquaserv S.A.) și Antreprenori',
                        'Asigurarea testării și funcționării cu succes a lucrărilor la finalizare, în timpul Perioadei de Notificare a Defecțiunilor/Perioadei de Garanție',
                        'Asistența tehnică, pe întreaga durată de derulare a contractului de servicii, privind implementarea lucrărilor și în Perioada de Notificare a Defecțiunilor/Perioada de Garanție',
                        'Implementarea cu succes a Proiectului va conduce la realizarea indicatorilor tehnici din punct de vedere al calității, costurilor și perioadei de timp',
                        'Asigurarea sprijinului pentru Operatorul Regional pe parcursul întâlnirilor lunare de progres ale Supervizorului cu toți Antreprenorii (contractorii de lucrări) în vederea stabilirii progresului Proiectului aprobat prin Decizia de finanțare',
                        'Atenuarea riscurilor asupra sănătății umane cauzate de descărcările de apă uzată netratată sau tratată insuficient, precum și eliminarea riscurilor de inundații, în urma atingerii indicatorilor specifici contractelor de lucrări',
                        'Realizarea de economii în ceea ce privește costurile operaționale implicate de administrarea sistemelor de apă și canalizare',
                    ]],
                    ['titlu' => 'Rezultatele contractului de servicii de asistență tehnică pentru management, publicitate și supervizare', 'items' => [
                        'Organizarea eficientă a Operatorului Regional Aquaserv S.A. Tulcea în implementarea cu succes a Proiectului, precum și a altor proiecte de investiții de valoare și complexitate similară cu proiectele de investiții promovate prin POIM (2014-2020), atât la nivelul resurselor umane, cât și al celor operaționale/tehnice',
                        'Implementarea Proiectului conform atât obiectivelor incluse în Cererea de finanțare și Studiul de Fezabilitate, cât și a prevederilor Contractului de finanțare, cu încadrarea în bugetele alocate și cu respectarea termenelor stabilite',
                        'Realizarea unui sistem operațional GIS pentru rețelele de apă și de canalizare',
                        'Asigurarea condițiilor pentru implementarea unui management al pierderilor de apă în rețeaua de distribuție a apei potabile în aria de operare a OR',
                        'Implementarea unui model hidraulic calibrat pentru sistemul de alimentare cu apă potabilă și de canalizare în aria Proiectului',
                        'Implementării planului de tarife conform prevederilor din Cererea de finanțare',
                        'Actualizarea la nivel județean a Strategiei de management al apelor uzate industriale descărcate în rețeaua de canalizare și a managementului nămolurilor și al altor reziduuri, luând în considerare noile localități și activități economice',
                        'Asigurarea conformării cu cerințele Directivei 2020/2184 privind calitatea apei destinate consumului uman și cu Directiva 91/271/CEE privind colectarea și epurarea apelor uzate în aria de proiect',
                        'Planificarea și implementarea unei campanii de publicitate eficientă privind Proiectul; asigurarea informării periodice a publicului despre obiectivele și stadiul Proiectului, precum și despre obligațiile care îi revin în calitate de consumator al serviciilor asigurate de OR',
                        'Finalizarea cu succes din punct de vedere al calității, costurilor și perioadei de timp a celor 18 contracte de lucrări, în conformitate cu Decizia de Finanțare, la parametrii și indicatorii aprobați și cu respectarea condițiilor din Contractul de Finanțare',
                        'Asigurarea unui Plan de investiții prioritare și a unui Master Plan Regional actualizat la sfârșitul Proiectului',
                        'Asigurarea unei monitorizări corespunzătoare a calității apei potabile',
                    ]],
                ],
                'status' => 'Semnat · în implementare',
            ],
            [
                'cod' => 'CS-2',
                'titlu' => 'Servicii de audit financiar',
                'valoare' => '1.177.200 lei plus TVA',
                'contractor' => null,
                'data' => '19.07.2023',
                'durata' => '59 de luni de la emiterea Ordinului de Începere',
                'obiectiv' => 'Auditarea cheltuielilor proiectului, inclusiv întocmirea de rapoarte trimestriale și anuale privind Proiectul Regional.',
                'texte' => [
                    'În data de 19.07.2023, Aquaserv S.A. Tulcea a semnat al doilea contract de servicii, respectiv CS2 – Servicii de audit financiar pentru proiectul Proiect Regional de Dezvoltare a Infrastructurii de Apă și Apă Uzată din Județul Tulcea, contract în valoare de 1.177.200 lei la care se adaugă TVA.',
                    'Durata contractului este de 59 de luni de la emiterea Ordinului de Începere și are ca obiect:',
                ],
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Auditarea cheltuielilor aferente sumelor plătite și solicitate spre rambursare de către Achizitor în Cererile de Rambursare pentru fiecare din activitățile desfășurate în cadrul Contractului de finanțare și/sau evidențiate în cereri de rambursare ca și contribuție proprie (NFG – Non Funding Gap)',
                        'Auditarea cheltuielilor aferente Proiectului care nu vor face obiectul unor cereri de rambursare, dar care ar putea fi solicitate de către Autoritatea de Management să fie supuse auditului pentru asigurarea unui audit integral de Proiect',
                        'Întocmirea de către Prestator de rapoarte trimestriale, corespunzător uneia sau mai multor Cereri de Rambursare întocmite de Beneficiar pe parcursul perioadei respective, și de rapoarte anuale cu privire la Proiectul Regional de Dezvoltare a Infrastructurii de Apă și Apă Uzată din Județul Tulcea, conform Caietului de sarcini',
                    ]],
                ],
                'status' => 'Semnat · în implementare',
            ],
        ];

        $furnizare = [
            [
                'cod' => 'CF-2',
                'titlu' => 'Furnizare echipament naval pentru operarea infrastructurii de apă și apă uzată – Lot 2 – Echipament naval bărci',
                'valoare' => '484.229,67 lei plus TVA',
                'contractor' => 'S.C. PAGREIMA S.R.L.',
                'data' => '28.11.2023',
                'durata' => '6 luni de la emiterea Ordinului de Începere',
                'obiectiv' => 'Furnizarea de echipamente operaționale: o barcă pentru transport persoane, cu peridoc inclus, și o barcă pentru transport materiale.',
                'texte' => [
                    'Contractul în valoare de 484.229,67 lei la care se adaugă TVA, a fost semnat în data de 28.11.2023 între S.C. Aquaserv S.A. Tulcea și S.C. Pagreima S.R.L., având o durată de 6 luni de la emiterea Ordinului de Începere și are ca obiect furnizarea de echipamente operaționale, respectiv:',
                ],
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Barcă transport persoane cu peridoc inclus – 1 buc.',
                        'Barcă transport materiale – 1 buc.',
                    ]],
                ],
                'texte_final' => [
                    'Contractul s-a finalizat în data de 18.12.2023.',
                    'Ordin de începere a Contractului de Furnizare 14221/28.11.2023.',
                    'Proces verbal de recepție calitativă-cantitativă - 18.12.2023.',
                ],
                'status' => 'Finalizat (18.12.2023)',
            ],
        ];

        return compact('lucrari', 'servicii', 'furnizare');
    }

    /**
     * Comunicare — comunicate de presă
     * GET /comunicare
     */
    public function comunicare()
    {
        $comunicate = ComunicatPddtj::orderByDesc('data')->get();

        return view('pddtj.comunicare', compact('comunicate'));
    }

    /**
     * Galerie foto, organizată pe contracte
     * GET /galerie
     */
    public function galerie()
    {
        $basePath = storage_path('app/public/galerie/pddtj');

        $galerii = [];
        foreach (PddtjAdminController::categoriiGalerie() as $cod => $titlu) {
            $cale = $basePath . DIRECTORY_SEPARATOR . $cod;
            $poze = [];

            if (is_dir($cale)) {
                foreach (scandir($cale) as $f) {
                    if ($f === '.' || $f === '..') continue;
                    if (!in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) continue;
                    $poze[] = 'galerie/pddtj/' . $cod . '/' . $f;
                }
                sort($poze);
            }

            $galerii[] = ['cod' => $cod, 'titlu' => $titlu, 'poze' => $poze];
        }

        return view('pddtj.galerie', compact('galerii'));
    }

    /**
     * Contact
     * GET /contact
     */
    public function contact()
    {
        return view('pddtj.contact');
    }
}
