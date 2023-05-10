<x-filament::page>
    <div class="print">
        <img src="http://filament.loc/storage/{{ $patient->photo }}" alt="">

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
                        Имя
                    </th>
                    <td class="px-6 py-4">
                        {{ $patient->name  }}
                    </td>

                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Диагноз
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
                </tbody>
            </table>
        </div>




    </div>
    <div class="print-button filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action cursor-pointer">Печать</div>

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
    </style>
    <script>
let printButton = document.querySelector('.print-button');

printButton.addEventListener('click', ()=>{

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
