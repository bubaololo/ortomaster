<x-filament::page>
    <div class="print">
        <img src="http://filament.loc/storage/{{ $patient->photo }}" alt="">
Print!
    {{ $patient->name  }}
    </div>
    <div class="button filament-button filament-button-size-md">Печать</div>

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
let printButton = document.querySelector('.button');
let interfaceElements = document.querySelectorAll('aside, header, footer');

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
