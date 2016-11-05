@extends('layouts.app')

@section('content')
<DIV class="container">
    <DIV class="row">
        <DIV class="col-md-10 col-md-offset-1">
            <DIV class="panel panel-default">
                <DIV class="panel-heading">{{ $exp->name}}</DIV>

                <DIV class="panel-body">
                    Informations : </BR>
                    <h3>{{ $exp->about }}</h3>

                    address : </BR>
                    <h3>{{ $exp->adress }}</h3>

                               @if ($exp->ville == '01')
                                    01 - Ain
                               @elseif ($exp->ville == '02')
                                    02 - Aisne
                               @elseif ($exp->ville == '03')
                                    03 - Allier
                               @elseif ($exp->ville == '04')
                                    04 - Alpes de Haute Provence
                               @elseif ($exp->ville == '05')
                                    05 - Alpes (Hautes)
                               @elseif ($exp->ville == '06')
                                    06 - Alpes Maritimes
                               @elseif ($exp->ville == '07')
                                    07 - Ard&egrave;che
                               @elseif ($exp->ville == '08')
                                    08 - Ardennes
                               @elseif ($exp->ville == '09')
                                    09 - Ari&egrave;ge
                               @elseif ($exp->ville == '10')
                                    10 - Aube
                               @elseif ($exp->ville == '11')
                                    11 - Aude
                               @elseif ($exp->ville == '12')
                                    12 - Aveyron
                               @elseif ($exp->ville == '13')
                                    13 - Bouches du Rh&ocirc;ne
                               @elseif ($exp->ville == '14')
                                    14 - Calvados
                               @elseif ($exp->ville == '15')
                                    15 - Cantal
                               @elseif ($exp->ville == '16')
                                    16 - Charente
                               @elseif ($exp->ville == '17')
                                    17 - Charente Maritime
                               @elseif ($exp->ville == '18')
                                    18 - Cher
                               @elseif ($exp->ville == '19')
                                    19 - Corr&egrave;ze
                               @elseif ($exp->ville == '20')
                                    20 - Corse
                               @elseif ($exp->ville == '21')
                                    21 - C&ocirc;te d&acute;Or
                               @elseif ($exp->ville == '22')
                                    22 - C&ocirc;tes d&acute;Armor
                               @elseif ($exp->ville == '23')
                                    23 - Creuse
                               @elseif ($exp->ville == '24')
                                    24 - Dordogne
                               @elseif ($exp->ville == '25')
                                    25 - Doubs
                               @elseif ($exp->ville == '26')
                                    26 - Dr&ocirc;me
                               @elseif ($exp->ville == '27')
                                    27 - Eure
                               @elseif ($exp->ville == '28')
                                    28 - Eure et Loir
                               @elseif ($exp->ville == '29')
                                    29 - Finist&egrave;re
                               @elseif ($exp->ville == '30')
                                    30 - Gard
                               @elseif ($exp->ville == '31')
                                    31 - Garonne (Haute)
                               @elseif ($exp->ville == '32')
                                    32 - Gers
                               @elseif ($exp->ville == '33')
                                    33 - Gironde
                               @elseif ($exp->ville == '34')
                                    34 - H&eacute;rault
                               @elseif ($exp->ville == '35')
                                    35 - Ille et Vilaine
                               @elseif ($exp->ville == '36')
                                    36 - Indre
                               @elseif ($exp->ville == '37')
                                    37 - Indre et Loire
                               @elseif ($exp->ville == '38')
                                    38 - Is&egrave;re
                               @elseif ($exp->ville == '39')
                                    39 - Jura
                               @elseif ($exp->ville == '40')
                                    40 - Landes
                               @elseif ($exp->ville == '41')
                                    41 - Loir et Cher
                               @elseif ($exp->ville == '42')
                                    42 - Loire
                               @elseif ($exp->ville == '43')
                                    43 - Loire (Haute)
                               @elseif ($exp->ville == '44')
                                    44 - Loire Atlantique
                               @elseif ($exp->ville == '45')
                                    45 - Loiret
                               @elseif ($exp->ville == '46')
                                    46 - Lot
                               @elseif ($exp->ville == '47')
                                    47 - Lot et Garonne
                               @elseif ($exp->ville == '48')
                                    48 - Loz&egrave;re
                               @elseif ($exp->ville == '49')
                                    49 - Maine et Loire
                               @elseif ($exp->ville == '50')
                                    50 - Manche
                               @elseif ($exp->ville == '51')
                                    51 - Marne
                               @elseif ($exp->ville == '52')
                                    52 - Marne (Haute)
                               @elseif ($exp->ville == '53')
                                    53 - Mayenne
                               @elseif ($exp->ville == '54')
                                    54 - Meurthe et Moselle
                               @elseif ($exp->ville == '55')
                                    55 - Meuse
                               @elseif ($exp->ville == '56')
                                    56 - Morbihan
                               @elseif ($exp->ville == '57')
                                    57 - Moselle
                               @elseif ($exp->ville == '58')
                                    58 - Ni&egrave;vre
                               @elseif ($exp->ville == '59')
                                    59 - Nord
                               @elseif ($exp->ville == '60')
                                    60 - Oise
                               @elseif ($exp->ville == '61')
                                    61 - Orne
                               @elseif ($exp->ville == '62')
                                    62 - Pas de Calais
                               @elseif ($exp->ville == '63')
                                    63 - Puy de D&ocirc;me
                               @elseif ($exp->ville == '64')
                                    64 - Pyr&eacute;n&eacute;es Atlantiques
                               @elseif ($exp->ville == '65')
                                    65 - Pyr&eacute;n&eacute;es (Hautes)
                               @elseif ($exp->ville == '66')
                                    66 - Pyr&eacute;n&eacute;es Orientales
                               @elseif ($exp->ville == '67')
                                    67 - Rhin (Bas)
                               @elseif ($exp->ville == '68')
                                    68 - Rhin (Haut)
                               @elseif ($exp->ville == '69')
                                    69 - Rh&ocirc;ne
                               @elseif ($exp->ville == '70')
                                    70 - Sa&ocirc;ne (Haute)
                               @elseif ($exp->ville == '71')
                                    71 - Sa&ocirc;ne et Loire
                               @elseif ($exp->ville == '72')
                                    72 - Sarthe
                               @elseif ($exp->ville == '73')
                                    73 - Savoie
                               @elseif ($exp->ville == '74')
                                    74 - Savoie (Haute)
                               @elseif ($exp->ville == '75')
                                    75 - Paris (Dept.)
                               @elseif ($exp->ville == '76')
                                    76 - Seine Maritime
                               @elseif ($exp->ville == '77')
                                    77 - Seine et Marne
                               @elseif ($exp->ville == '78')
                                    78 - Yvelines
                               @elseif ($exp->ville == '79')
                                    79 - S&egrave;vres (Deux)
                               @elseif ($exp->ville == '80')
                                    80 - Somme
                               @elseif ($exp->ville == '81')
                                    81 - Tarn
                               @elseif ($exp->ville == '82')
                                    82 - Tarn et Garonne
                               @elseif ($exp->ville == '83')
                                    83 - Var
                               @elseif ($exp->ville == '84')
                                    84 - Vaucluse
                               @elseif ($exp->ville == '85')
                                    85 - Vend&eacute;e
                               @elseif ($exp->ville == '86')
                                    86 - Vienne
                               @elseif ($exp->ville == '87')
                                    87 - Vienne (Haute)
                               @elseif ($exp->ville == '88')
                                    88 - Vosges
                               @elseif ($exp->ville == '89')
                                    89 - Yonne
                               @elseif ($exp->ville == '90')
                                    90 - Belfort (Territoire de)
                               @elseif ($exp->ville == '91')
                                    91 - Essonne
                               @elseif ($exp->ville == '92')
                                    92 - Hauts de Seine
                               @elseif ($exp->ville == '93')
                                    93 - Seine Saint Denis
                               @elseif ($exp->ville == '94')
                                    94 - Val de Marne
                               @elseif ($exp->ville == '95')
                                    95 - Val d&acute;Oise
                               @elseif ($exp->ville == '98')
                                    98 - Mayotte
                               @elseif ($exp->ville == '9A')
                                    9A - Guadeloupe
                               @elseif ($exp->ville == '9B')
                                    9B - Guyane
                               @elseif ($exp->ville == '9C')
                                    9C - Martinique
                               @elseif ($exp->ville == '9D')
                                    9D - R&eacute;union
                               @endif
                    <DIV class="panel-body">
                    price :    </BR>
                    {{ $exp->price }} €
                    </DIV>
                    <DIV class="panel-body">
                    owner :    </BR>
                    {{ $exp->name_owner }}
                    </DIV>
                    <DIV class="form-group">
                        Surface {{ $exp->surface }}m²
                        | {{ $exp->room}} chambre(s)
                        | {{ $exp->level}} étage(s)
                        | @if(!$exp->parking)
                            pas de
                          @endif
                        Parking
                        |@if(!$exp->elevator)
                            pas d'
                        @endif
                         ascensseur
                        | chauffage @if(!$exp->electicity)
                          Gaz
                        @else
                          Electricité
                        @endif
                        | Class energy {{ $exp->class_nrj}}
                        | Class gaz {{ $exp->class_gaz }}
                        |
                        @if(!$exp->availability)
                            pas
                        @endif
                        disponible

                    </DIV>
                    {{ link_to_route('exp.index', 'Retour', [$exp->id], ['class' => 'btn btn-info']) }}
                    {!! Form::close() !!}

                </DIV>
            </DIV>

        </DIV>
    </DIV>
</DIV>
@endsection
