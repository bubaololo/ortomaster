<x-filament::page>
    <div class="print">
        <style>
            /*@media print {*/
            /*    !*aside, header, .filament-main-footer {*!*/
            /*    !*    display: none;*!*/
            /*    !*}*!*/
            /*    body {*/
            /*        visibility: hidden;*/

            /*    }*/
            /*    header {*/
            /*        display: none;*/
            /*    }*/
            /*    .print {*/
            /*        visibility: visible;*/
            /*        position: fixed;*/
            /*        top: 5px;*/
            /*        left: 5px;*/
            /*    }*/
            /*}*/
            .logo {
                width: 30vw;
                margin: 0 auto;
            }

            .main-title {
                margin-top: 20pt;
                font-size: 30pt;
                text-align: center;
            }

            table {
                font-size: 15pt !important;
                line-height: 20pt !important;
            }

            .rec {
                margin-top: 40pt;
                font-size: 15pt !important;
                line-height: 20pt !important;
                position: relative;
            }
            .qr-code {
                position: absolute;
                top: 0;
                right: 0;
                text-align: center;
            }

            .rec__title {
                font-weight: bold;
                margin-bottom: 20pt;
            }

            .rec__item {
                margin-bottom: 10pt;
            }

            .arc {
                display: flex;
                gap: 10pt;
            }

            .doc {
                font-style: italic;
                text-align: right;
            }
            .subs {
                margin-top: 40pt;
                font-size: 10pt;
                font-style: italic;
            }
        </style>
        <img src="{{ asset('/img/logo.svg') }}" alt="Logo" class="logo">
        {{--<img src="{{ asset( 'storage/'.$appointment->photo) }}" alt="">--}}
        <div class="main-title">Протокол плантоскопии</div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                {{--<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
                {{--<tr>--}}
                {{--    <th scope="col" class="px-6 py-3">--}}
                {{--        Имя--}}
                {{--    </th>--}}
                {{--    <th scope="col" class="px-6 py-3">--}}
                {{--        Диагноз--}}
                {{--    </th>--}}
                {{--    <th scope="col" class="px-6 py-3">--}}
                {{--        Дата рождения--}}
                {{--    </th>--}}

                {{--</tr>--}}
                {{--</thead>--}}
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Фио
                    </th>
                    <td class="px-6 py-4">
                        {{ $patient->name  }}
                    </td>

                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Дата рождения
                    </th>
                    <td class="px-6 py-4">
                        {{ $patient->birthdate  }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Дата обследования
                    </th>
                    <td class="px-6 py-4">
                        {{ $appointment->created_at  }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Диагноз
                    </th>
                    <td class="px-6 py-4">
                        @foreach($appointment->diagnosis as $diag)

                            @if(!$loop->last)
                                {{ $diag }},
                            @else
                                {{ $diag }}
                            @endif
                        @endforeach
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="rec">
            <div class="rec__title">
                Рекомендации:
            </div>
            <div class="rec__item">
                ЛФК
            </div>
            <div class="rec__item">
                Балансировочный диск 10-15 мин. в день
            </div>
            <div class="rec__item">
                Ортопедические стельки
            </div>
            <div class="rec__item arc">
                <div class="arc__title"><strong>Высота сводов:</strong></div>
                <div class="arc__grid">
                    <div class="arc__top-row">
                        продольный свод: слева <strong>{{ $appointment->longitudinal_arch_left }}</strong>, справа
                        <strong>{{ $appointment->longitudinal_arch_right }}</strong>
                    </div>
                    <div class="arc__bot-row">
                        поперечный свод: <strong>{{ $appointment->transverse_arch  }}</strong>
                    </div>
                </div>
            </div>
            <div class="rec__item">
                <strong>Пронаторы:</strong> {{ $appointment->pronator_type }} слева: <strong>{{ $appointment->pronator_left }}</strong>, справа:
                <strong>{{ $appointment->pronator_right }}</strong>
            </div>
            @if ($appointment->bus)
                <div class="rec__item">
                    <strong>Отводящая шина:</strong> {{ $appointment->bus  }}
                </div>
            @endif
            @if ($appointment->shoes)
                <div class="rec__item">
                    <strong>Обувь:</strong> {{ $appointment->shoes  }}
                </div>
            @else
                <div class="rec__item">
                    <strong>Удобная, широкая обувь с высотой каблука не более 3.0 см</strong>
                </div>
            @endif
            <div class="rec__item">
                <strong>Тейпирование для тела</strong>
            </div>
            <div class="qr-code">
                {!! QrCode::size(130)->generate(asset( 'storage/'.$appointment->photo)); !!}
                Фото
            </div>
        </div>

        <div class="footer">
            <div class="doc">
                Вр. {{ $doctor }}
            </div>
            <div class="subs">
                *Скидка на повторный приём врача-ортопеда в течение 6 месяцев -50%.<br>
                *Скидка действует ТОЛЬКО ПРИ ПРЕДЪЯВЛЕНИИ ПРОТОКОЛА О ПРОХОЖДЕНИИ ПЛАНТОСКОПИИ в филиалах " <strong>Orto-Master</strong>".<br>
                *При одновременном заказе второй пары ортопедических стелек действует скидка 20%.
            </div>
        </div>
    </div>
    <div class="print-button filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action cursor-pointer">
        <svg class="filament-button-icon w-5 h-5 mr-1 -ml-2 rtl:ml-1 rtl:-mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
        </svg>
        <span class="">
            Печать
        </span>
    </div>

    <script>
      let printButton = document.querySelector('.print-button');

      printButton.addEventListener('click', () => {

// interfaceElements.forEach(el => {
//   el.style.display = (el.style.display === 'none') ? '' : 'none';
// });

        var body = document.body.innerHTML;
        var elem = document.querySelector('.print');
        document.body.innerHTML = elem.outerHTML;
        window.print();
        document.body.innerHTML = body;


        // window.print();
      })
    </script>
</x-filament::page>
