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
                'durata' => '610 zile (183 zile proiectare + 427 zile execuție)',
                'obiectiv' => 'Proiectare și execuție de lucrări de reabilitare a captărilor de apă brută în Tulcea și Mahmudia.',
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Reabilitare captare Milă 42+500',
                        'Reparații sisteme hidraulice și instalare semnalizare luminoasă',
                        'Reabilitare 4 camere de vane pe aspirație',
                        'Modernizare stație pompare (clădire, pompe, instalații electro-hidraulice, generator)',
                        'Reabilitare 11 cămine pe conductă aducțiune',
                        'Reparații drum acces (3,9 km)',
                        'Integrare SCADA',
                        'Reabilitări la captări Mahmudia',
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
                'durata' => '610 zile (180 zile proiectare + 430 zile execuție)',
                'obiectiv' => 'Modernizarea și extinderea infrastructurii de captare, tratare și stocare a apei în Carcaliu și Babadag.',
                'grupe' => [
                    ['titlu' => 'Carcaliu', 'items' => [
                        '1 foraj nou, reabilitare 2 foraje existente',
                        'Rezervor nou de înmagazinare',
                        'Laborator apă potabilă',
                        'Clădire administrativă cu dispecerat SCADA',
                    ]],
                    ['titlu' => 'Babadag', 'items' => [
                        'Reabilitare 10 foraje',
                        '5 complexe de înmagazinare-pompare (Zahăr, Carierei, Cabanei, Pădure, Ferme)',
                        'Sisteme de monitorizare CCTV și dezinfecție',
                        'Generatoare electrice de urgență',
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
                'durata' => '17 luni (6 luni proiectare + 11 luni execuție) de la ordinul administrativ de începere',
                'obiectiv' => 'Extinderea și modernizarea infrastructurii publice de alimentare cu apă și canalizare, pentru creșterea gradului de acces al populației la servicii de calitate și protecția mediului.',
                'grupe' => [
                    ['titlu' => 'Stație nouă Chilia Veche', 'items' => [
                        'Stație automată de recepție a vidanjelor',
                        'Treaptă de epurare mecano-biologică cu procesare nămol pe paturi de stuf',
                        'Laborator ape uzate',
                        'Centru local de comandă SCADA',
                        'Foraje de observație, conductă nouă de evacuare efluent',
                        'Generator electric de rezervă și panouri fotovoltaice',
                    ]],
                    ['titlu' => 'Extindere stație existentă Sulina', 'items' => [
                        'Stație automată de recepție, punct de monitorizare calitate influent',
                        'Sistem de dezinfecție și monitorizare debit efluent',
                        'Modernizare laborator ape uzate, foraje de observație',
                        'Sistem local SCADA, platforme depozitare nămol deshidratat',
                        'Panouri fotovoltaice',
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
                'obiectiv' => 'Reabilitarea și extinderea infrastructurii de apă și canalizare în Municipiul Tulcea, cu focus pe îmbunătățirea serviciilor și protecția mediului.',
                'grupe' => [
                    ['titlu' => null, 'items' => [
                        'Înlocuire rețea de distribuție apă: 37 străzi (9.784 m)',
                        'Extindere rețea apă: 3 străzi (317 m)',
                        'Instalare 14 puncte de monitorizare și 5 vane de presiune',
                        'Stație nouă de pompare apă potabilă',
                        'Înlocuire rețea canalizare: 34 străzi (11.204 m)',
                        'Extindere canalizare: 5 străzi (515 m)',
                        'Stație nouă de pompare apă uzată și reabilitarea a 4 stații existente',
                        'Integrare SCADA pentru 24 stații',
                    ]],
                ],
                'status' => 'Autorizație de construire emisă (22.06.2023) · în implementare',
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
                'durata' => '62 de luni de la ordinul administrativ de începere',
                'obiectiv' => 'Servicii de management și suport pentru Unitatea de Implementare a Proiectului și Aquaserv S.A. Tulcea, pentru implementarea cu succes a proiectului regional, cu respectarea termenelor și bugetelor aprobate.',
                'grupe' => [],
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
                'obiectiv' => 'Furnizarea echipamentelor operaționale: o barcă pentru transport persoane (inclusiv peridoc) și o barcă pentru transport materiale.',
                'grupe' => [],
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
