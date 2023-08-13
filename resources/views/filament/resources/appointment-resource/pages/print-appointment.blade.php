<x-filament::page>

    <main class="print">

        <link rel="stylesheet" href="{{ asset('css/print-page.css') }}">
        <div class="print__inner">
            <section class="header">
                <img src="{{ asset('/img/logo.svg') }}" alt="Logo" class="logo">
                <div class="main-title">Протокол плантоскопии</div>
            </section>
            <section class="table">
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
                        {{--</tr>--}}
                        {{--</thead>--}}
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Фио
                            </th>
                            <td class="px-6 py-4">
                                {{ $patient->fullName  }}
                            </td>

                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Дата рождения
                            </th>
                            <td class="px-6 py-4">
                                {{ $this->birthdate }} ({{ $this->age }})
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Дата и время обследования
                            </th>
                            <td class="px-6 py-4">
                                {{ $this->date }}
                            </td>
                        </tr>
                        @if($appointment->diabetic)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <strong>Индивидуальные особенности:</strong>
                                </th>
                                <td class="px-6 py-4">
                                    <strong style="text-decoration: underline">ДИАБЕТИЧЕСКАЯ СТОПА</strong>
                                </td>
                            </tr>
                        @endif
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
            </section>
            <section class="content">
                <div class="qr-code">
                    {!! QrCode::size(130)->generate(asset( 'storage/'.$appointment->photo)); !!}
                    Фото
                </div>
                @if ($appointment->bus)
                    <div class="rec__item">
                        <strong>Отводящая шина:</strong> {{ $appointment->bus  }}
                    </div>
                @endif
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
                @if ($appointment->shoes)
                    {{--SHOES--}}
                    <div class="rec__item">
                        <strong>Обувь:</strong> {{ $appointment->shoes }}
                    </div>
                    @if ($appointment->shoes_sides)
                        <div class="rec__item">
                            <strong>Укрепление борта:</strong> {{ $appointment->shoes_sides }}
                        </div>
                    @endif
                    {{--!SHOES--}}
                @else
                    {{--INSOLES--}}
                    <div class="rec__item">
                        <strong>Ортопедические стельки:</strong>
                    </div>
                    @if($appointment->pronator_type)
                        <div class="rec__item">
                            <strong>Пронаторы:</strong> {{ $appointment->pronator_type }} <br> слева:
                            <strong>{{ $appointment->pronator_left }}</strong>, справа:
                            <strong>{{ $appointment->pronator_right }}</strong>
                        </div>
                    @endif
                    <div class="rec__item">
                        <strong>Удобная, широкая обувь с высотой каблука не более 3.0 см</strong>
                    </div>
                    {{--!INSOLES--}}
                @endif
                <div class="rec">
                    <div class="rec__title">
                        Рекомендации:
                    </div>
                    <ol class="rec-list">
                        <li class="rec-list__item">
                            ЛФК
                        </li>
                        <li class="rec-list__item">
                            Ортопедический коврик
                        </li>
                        <li class="rec-list__item">
                            Физиолечение
                        </li>
                        <li class="rec-list__item">
                            Подушка-балансир по 5-10 мин. 2-3 р\день (диск-балансир)
                        </li>
                        <li class="rec-list__item">
                            Парафин
                        </li>
                        <li class="rec-list__item">
                            Массаж с упором на нижние конечности
                        </li>
                        @foreach($appointment->recommendation as $rec)
                            <li class="rec-list__item">
                                {{ $rec }}
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="appointment">
                    Повторный приём через: {{ $this->checkup  }}&#42
                </div>
            </section>

            <section class="footer">
                <div class="doc">
                    Вр. {{ $doctor }}
                </div>
                <div class="subs">
                    *Скидка на повторный приём врача-ортопеда в течение 6 месяцев -50%.<br>
                    *Скидка действует ТОЛЬКО ПРИ ПРЕДЪЯВЛЕНИИ ПРОТОКОЛА О ПРОХОЖДЕНИИ ПЛАНТОСКОПИИ в филиалах " <strong>Orto-Master</strong>".<br>
                    *При одновременном заказе второй пары ортопедических стелек действует скидка 20%.
                </div>
            </section>
        </div>
    </main>
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
