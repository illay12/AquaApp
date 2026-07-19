<?php

namespace App\Http\Controllers;

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
                'grupe' => [
                    ['titlu' => 'Reabilitare captări Tulcea', 'items' => [
                        'Captare Milă 42+500',
                        'Reabilitare instalații hidraulice aferente criburi și montare sistem de semnalizare cu balize luminoase',
                        'Reabilitarea camerelor de vane pe conductele de aspirație apă brută (4 unități)',
                    ]],
                    ['titlu' => 'Reabilitare stație de pompare apă brută', 'items' => [
                        'Reabilitare clădire, înlocuire pod rulant',
                        'Înlocuire pompe de apă brută, pompe epuisment, instalație hidraulică și instalație electrică',
                        'Furnizare și instalare generator electric de urgență',
                        'Lucrări de amenajare a incintei (reabilitare dig de protecție, sistem de drenaj ape pluviale, împrejmuire zonă de protecție sanitară)',
                        'Reabilitarea camerelor de vane pe conductele de refulare apă brută (4 unități)',
                        'Reabilitare linie electrică de alimentare captare și lucrări electrice la captare',
                    ]],
                    ['titlu' => 'Cămine și drum de acces', 'items' => [
                        'Reabilitare cămine existente pe firul 2 al conductei de aducțiune (11 unități)',
                        'Supraînălțare dig de protecție pe 1,7 km, de la captare până în zona canalului deschis „7 țevi”',
                        'Refacerea integrală a carosabilului drumului de acces – dale de beton, pe 3,9 km',
                        'Integrare captare în SCADA',
                    ]],
                    ['titlu' => 'Front captare Bogza', 'items' => [
                        'Reabilitare post de transformare',
                    ]],
                    ['titlu' => 'Reabilitare captări Mahmudia', 'items' => [
                        'Reabilitare clădire stație de pompare apă brută',
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
                'grupe' => [
                    ['titlu' => 'Carcaliu — reabilitare și extindere front captare', 'items' => [
                        'Realizare 1 foraj nou și aducțiune nouă de apă brută',
                        'Reabilitare 2 foraje existente',
                        'Sistem de monitorizare CCTV și antiefracție, integrare în SCADA',
                    ]],
                    ['titlu' => 'Carcaliu — gospodărie de apă', 'items' => [
                        'Înlocuire rezervor existent, instalație nouă de dezinfecție',
                        'Clădire administrativă nouă cu dispecerat local SCADA și laborator calitate apă potabilă',
                        'Furnizare și instalare generator electric de urgență',
                    ]],
                    ['titlu' => 'Babadag — front captare și aducțiuni', 'items' => [
                        'Reabilitare 10 foraje existente, rezervor tampon și stație de pompare apă brută',
                        'Sistem de monitorizare CCTV și antiefracție, instalație nouă de dezinfecție',
                        'Laborator calitate apă potabilă, generator electric de urgență, integrare în SCADA',
                        'Reabilitare aducțiuni de apă brută, vane de secționare cu acționare electrică și puncte de monitorizare a presiunii',
                    ]],
                    ['titlu' => 'Babadag — complexe de înmagazinare-pompare (Zahăr, Carierei, Cabanei, Pădure, Ferme)', 'items' => [
                        'Reabilitare rezervoare existente și, unde este cazul, stații de pompare apă potabilă',
                        'Instalații noi de dezinfecție și alimentare cu energie electrică',
                        'Generatoare electrice de urgență la fiecare complex',
                    ]],
                    ['titlu' => 'Dispecerat SCADA local', 'items' => [
                        'Dispecerat local SCADA – Apă Babadag, în compartimentul alocat din SE Babadag',
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
                'grupe' => [
                    ['titlu' => 'Stație nouă de epurare — Chilia Veche', 'items' => [
                        'Stație automată de recepție a vidanjelor',
                        'Stație completă de epurare mecanică și biologică, cu prelucrarea nămolului în filtre plantate cu stuf',
                        'Laborator apă uzată, dispecerat local SCADA',
                        'Foraje de observație în incintă, conductă nouă de descărcare a efluentului',
                        'Generator electric de urgență și sistem de panouri fotovoltaice',
                    ]],
                    ['titlu' => 'Extindere stație existentă — Sulina', 'items' => [
                        'Stație automată de recepție a vidanjelor, punct de monitorizare calitate influent',
                        'Sistem de dezinfecție și punct de monitorizare debit efluent',
                        'Completare dotări laborator apă uzată, foraje de observație în incintă',
                        'Dispecerat local SCADA, platforme noi de depozitare a nămolului deshidratat',
                        'Sistem de panouri fotovoltaice',
                    ]],
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
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Înlocuire rețea de distribuție existentă pe 37 de străzi din municipiul Tulcea (9.784 m conducte)',
                        'Extindere rețea de distribuție pe 3 străzi (317 m conducte)',
                        'Instalare 14 puncte de monitorizare a debitului și 5 vane de reducere a presiunii în rețeaua de distribuție',
                        'Execuție stație de pompare a apei potabile, inclusiv conectările la infrastructura existentă',
                        'Achiziționare 5 terminale pentru citirea contoarelor și software-ul aferent',
                        'Înlocuire rețea de canalizare existentă pe 34 de străzi (11.204 m conducte)',
                        'Extindere rețea de canalizare pe 5 străzi (515 m conducte)',
                        'Execuție stație nouă de pompare a apei uzate, inclusiv conectarea la infrastructura existentă și conducta de refulare aferentă',
                        'Reabilitarea a 4 stații de pompare a apei uzate existente și înlocuirea conductei de refulare aferente SP4',
                        'Reconfigurarea unui colector de apă uzată menajeră prin conectarea la infrastructura existentă',
                        'Integrarea în SCADA a 24 de stații de pompare a apei uzate existente',
                    ]],
                ],
                'status' => 'Autorizație de construire nr. 93 din 22.06.2023 · în implementare',
            ],
            [
                'cod' => 'CL5',
                'titlu' => 'TL-CL-05: Extinderea și reabilitarea captărilor de apă, stațiilor de tratare și rezervoarelor de înmagazinare în Sulina, Crișan și Mila 23',
                'valoare' => '39.900.000 lei fără TVA',
                'contractor' => 'Asocierea S.C. DINAMIC CONSTRUCT S.R.L. (lider ofertant) – S.C. GAZ CONTROL S.R.L. (ofertant), cu ALLPLAN PROIECT (subcontractant) și ARCIF AG, S.C. ARCON AG (terți susținători)',
                'data' => '16.07.2026',
                'durata' => '24 luni de la ordinul administrativ de începere, din care 6 luni proiectare',
                'obiectiv' => 'Extinderea și reabilitarea surselor de apă, stațiilor de tratare și rezervoarelor de înmagazinare din Sulina, Crișan și Mila 23.',
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
                'obiectiv' => 'Prin contractul de servicii de asistență tehnică și supervizare, inclusiv publicitate, Consultantul furnizează servicii de management și suport pentru Unitatea de Implementare a Proiectului și pentru Beneficiar, Aquaserv S.A. Tulcea, în vederea implementării în bune condiții a proiectului, astfel încât obiectivele asumate prin Contractul de Finanțare să fie atinse în limitele de timp și de buget aprobate. Durata serviciilor de supervizare acoperă în totalitate durata proiectării și a execuției lucrărilor din contractele de lucrări, plus perioada de garanție.',
                'grupe' => [
                    ['titlu' => 'Obiective specifice ale contractului de asistență tehnică', 'items' => [
                        'Sprijin calificat și eficient pentru Operatorul Regional în managementul proiectului, conform Contractului de Finanțare',
                        'Asigurarea publicității și promovării adecvate a proiectului, conform Manualului de Identitate Vizuală pentru Instrumentele Structurale 2014-2020',
                        'Actualizarea și completarea modelării hidraulice a rețelelor de apă/canal din aria proiectului',
                        'Sprijin pentru Operatorul Regional în implementarea sistemului GIS la nivelul întregii arii a proiectului',
                        'Asigurarea condițiilor pentru un management modern și eficient al rețelelor de apă și canalizare din localitățile vizate',
                        'Asigurarea implementării optime a contractelor de lucrări',
                        'Actualizarea strategiei de management al nămolului rezultat din stațiile de tratare și epurare',
                        'Actualizarea strategiei și a planului de acțiune privind managementul apelor uzate industriale',
                        'Sprijin pentru Unitatea de Implementare a Proiectului privind programul de investiții curent și pe termen mediu și lung',
                        'Actualizarea Devizului general, a documentelor conexe și a analizei Cost-Beneficiu, ori de câte ori este necesar',
                        'Asigurarea condițiilor pentru aplicarea Directivei privind apa potabilă, protecția surselor de apă și managementul pierderilor de apă în rețea',
                    ]],
                    ['titlu' => 'Obiective privind supervizarea lucrărilor', 'items' => [
                        'Îndeplinirea rolului de Supervizor (Inginer, conform FIDIC) pentru contractele de lucrări din cadrul proiectului',
                        'Asigurarea finalizării lucrărilor conform contractelor încheiate între Aquaserv S.A. Tulcea și antreprenori',
                        'Asigurarea testării și funcționării cu succes a lucrărilor la finalizare, în Perioada de Notificare a Defecțiunilor/Garanție',
                        'Asistență tehnică pe întreaga durată a contractului de servicii, privind implementarea lucrărilor',
                        'Sprijin pentru Operatorul Regional în cadrul întâlnirilor lunare de progres cu antreprenorii',
                        'Atenuarea riscurilor asupra sănătății umane și eliminarea riscurilor de inundații, prin atingerea indicatorilor din contractele de lucrări',
                        'Realizarea de economii la costurile operaționale de administrare a sistemelor de apă și canalizare',
                    ]],
                    ['titlu' => 'Rezultate așteptate', 'items' => [
                        'Implementarea proiectului conform Cererii de finanțare, Studiului de Fezabilitate și Contractului de Finanțare, cu încadrarea în bugete și termene',
                        'Realizarea unui sistem operațional GIS pentru rețelele de apă și canalizare',
                        'Management al pierderilor de apă în rețeaua de distribuție a apei potabile din aria de operare',
                        'Implementarea unui model hidraulic calibrat pentru sistemul de alimentare cu apă și canalizare',
                        'Implementarea planului de tarife conform Cererii de finanțare',
                        'Actualizarea, la nivel județean, a strategiei de management al apelor uzate industriale și al nămolurilor',
                        'Conformarea cu Directiva 2020/2184 privind calitatea apei potabile și Directiva 91/271/CEE privind apele uzate urbane',
                        'Finalizarea cu succes a celor 18 contracte de lucrări din cadrul proiectului, conform Deciziei de Finanțare',
                        'Un Plan de investiții prioritare și un Master Plan Regional actualizat la finalul proiectului',
                        'Monitorizarea corespunzătoare a calității apei potabile',
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
                'obiectiv' => 'Contract de servicii de audit financiar pentru proiectul regional, având ca obiect: auditarea cheltuielilor aferente sumelor plătite și solicitate spre rambursare de către Achizitor (inclusiv contribuția proprie – Non Funding Gap); auditarea cheltuielilor aferente proiectului care nu fac obiectul cererilor de rambursare, dar care ar putea fi solicitate de Autoritatea de Management pentru un audit integral de proiect; întocmirea de către Prestator a unor rapoarte trimestriale, corespunzătoare cererilor de rambursare, și a unor rapoarte anuale privind proiectul, conform Caietului de sarcini.',
                'grupe' => [],
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
                'obiectiv' => 'Furnizarea de echipamente operaționale: o barcă pentru transport persoane, cu peridoc inclus (1 buc.), și o barcă pentru transport materiale (1 buc.).',
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Ordin de începere a Contractului de Furnizare nr. 14221 din 28.11.2023',
                        'Proces verbal de recepție calitativ-cantitativă din 18.12.2023',
                    ]],
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
        return view('pddtj.comunicare');
    }

    /**
     * Galerie foto, organizată pe contracte
     * GET /galerie
     */
    public function galerie()
    {
        return view('pddtj.galerie');
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
