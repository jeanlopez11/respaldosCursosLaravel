<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    {{-- //esto seria mas un componente que diseño cuando no se puede agregar como fondo --}}
    <style>
        /* PARA HACERLO REPETIDO DEBEMOS CREARLO EN TIPO COMPONENTE */
        .fondo-logo {
            background-image: url("{{ asset('Logo.png') }}");
            height: 400px;
            width: 400px;
            /* para que la imagen se adapte al tamaño definido se ubica  */
            /* en la clase: bg-contain // (bg-repeat-x(o y))
            y bg-no-repeat para que no se repita y se adapte
            bg-cover considera el tamañó ideal y completa el ancho y alto establecido
            al bg-cover se le agrega bg-right para especificar porque lado empezar
            */
        }

        .container {
            /* background-color: red; */
        }
    </style>
    {{-- lo diseños globales se encuentran establecidos (se aplican y sobreescriben a los actuales de tailwind) en app.css --}}
    <button type="button" class="bg-indigo-500 ..." disabled>
        <svg class="motion-reduce:hidden animate-spin ..." viewBox="0 0 24 24"><!-- ... --></svg>
        Processing...
      </button>
    <div class="bg-blue-300 bg-opacity-50 w-64 h-screen">
        <h1>SIDEBAR</h1>
        <nav class="divide-x-2 divide-blue-300">
            <a href="{{route('pruebas-layout')}}">Link 1</a>
            <a href="{{route('pruebas-layout')}}">Link 2</a>
            <a href="{{route('pruebas-layout')}}">Link 3</a>
            <a href="{{route('pruebas-layout')}}">Link 4</a>
            <a href="{{route('pruebas-layout')}}">Link 5</a>
        </nav>
    </div>
    <br><br>
    <div class="container">
        <div
            class="bg-blue-700 text-5xl text-center font-bold bg-gradient-to-r from-blue-500 via-green-600 to-yellow-500">
            HOLA MUNDO
        </div>
    </div>
    <div class="container">
        <div
            class="bg-blue-700 text-5xl text-center font-bold bg-gradient-to-r from-blue-500 via-green-600 to-yellow-500 bg-clip-text text-transparent">
            HOLA MUNDO
        </div>
    </div>




    <h1>CAJAS</h1>
    <div>
        {{-- con h-full ocupamos todo el ancho de la caja padre superior --}}
        <div class="bg-blue-500 h-64">
            {{-- aqui especificamos por defecto ocupe todo el ancho y a partir de mediano que ocupe 3/4 partes, 
                ASI MISMO SE LE PONE UN MAXIMO PARA QUE CRESCA DE 5X6 QUE EQUIVALE A 64REM --}}
            {{-- <div class="bg-red-600 h-full w-full md:w-3/4 max-w-5xl">  --}}
            <div class="bg-red-600 h-full w-64">

            </div>
        </div>
    </div>
    <br><br>
    <h1>TABLAS</h1>
    <div class="container">
        <table class="table lg:border-collapse border-separate">
            <thead>
                <tr>
                    <th class="w-1/4">Pais</th>
                    <th class="w-1/4">Ciudad</th>
                    <th class="w-1/2">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Peru</th>
                    <th>Lima</th>
                    <th>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque veritatis adipisci cumque
                        impedit aspernatur delectus totam quidem corporis aut recusandae, molestiae, nobis esse debitis
                        fuga aliquam est consequuntur voluptatibus eveniet.
                    </th>
                </tr>
                <tr>
                    <th>Ecuador</th>
                    <th>Manta</th>
                    <th>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque veritatis adipisci cumque
                        impedit aspernatur delectus totam quidem corporis aut recusandae, molestiae, nobis esse debitis
                        fuga aliquam est consequuntur voluptatibus eveniet.
                    </th>
                </tr>
                <tr>
                    <th>Ecuador</th>
                    <th>Guayaquil</th>
                    <th>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque veritatis adipisci cumque
                        impedit aspernatur delectus totam quidem corporis aut recusandae, molestiae, nobis esse debitis
                        fuga aliquam est consequuntur voluptatibus eveniet.
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <x-input-label onclick="Validations.validar()" :value="__('Last Name')" />
    <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="last_name" class="block mt-1 w-full"
        type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />


    <div class="container mx-auto pt-5">
        {{-- SEGUN SE NECESITE EL BORDER border-r-8 || borde-l-t-b --}}
        {{-- rounded-lg  si queremos que redondee por completo rounded-full --}}
        {{-- si queremos diseño ovalado o diferente debemos cambiar las medias w-64 h-64 que no sean iguales --}}
        <div class="w-64 h-64 bg-gray-600 border-8 border-blue-500 rounded-lg hover:border-red-400">
        </div>
        <div class="divide-y-2 divide-gray-600 divide-dashed">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem a temporibus quae hic. Esse hic quia
                odit tempora cumque, mollitia sequi nulla ipsam eligendi facere, cum obcaecati doloribus, consequatur
                impedit</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem a temporibus quae hic. Esse hic quia
                odit tempora cumque, mollitia sequi nulla ipsam eligendi facere, cum obcaecati doloribus, consequatur
                impedit!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem a temporibus quae hic. Esse hic quia
                odit tempora cumque, mollitia sequi nulla ipsam eligendi facere, cum obcaecati doloribus, consequatur
                impedit!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem a temporibus quae hic. Esse hic quia
                odit tempora cumque, mollitia sequi nulla ipsam eligendi facere, cum obcaecati doloribus, consequatur
                impedit!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem a temporibus quae hic. Esse hic quia
                odit tempora cumque, mollitia sequi nulla ipsam eligendi facere, cum obcaecati doloribus, consequatur
                impedit!</p>
        </div>
        <h1>navegacion</h1>
        <nav class="divide-x-2 divide-blue-300">
            <a href="{{route('pruebas-layout')}}">Link 1</a>
            <a href="{{route('pruebas-layout')}}">Link 2</a>
            <a href="{{route('pruebas-layout')}}">Link 3</a>
            <a href="{{route('pruebas-layout')}}">Link 4</a>
            <a href="{{route('pruebas-layout')}}">Link 5</a>
        </nav>
    </div>
    <br><br>
    {{-- LOGO TAMAÑO FIJO REPETIBLE Y COMPLETO DE TIPO COMPONENTE REPETIBLE --}}
    <div class="container">
        <x-logo />
    </div>
    {{-- LOGO TAMAÑO FIJO NO SOLO LOCAL LA CLASE REPETIBLE Y COMPLETO DE TIPO COMPONENTE REPETIBLE  --}}
    <div class="container">
        <div class="fondo-logo bg-contain bg-no-repeat">
        </div>
    </div>
    <br><br>
    <div class="container">
        <h1 class="">EXAMPLE</h1>
        <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facilis accusantium rem
            alias necessitatibus maxime doloribus repudiandae! Dolorum incidunt optio suscipit, exercitationem dolorem
            recusandae adipisci, nulla labore, alias modi harum.</p>
        <ul class="">
            <li>elemento1</li>
            <li>elemento2</li>
            <li>elemento3</li>
        </ul>
    </div>
    <br><br><br>
    {{-- mx-auto da margen a ambos lados  --}}
    <h1>tabla 1 ordena primero verticalmente hay abajo y luego haria la derecha</h1>
    <div class="container">
        <div class="grid grid-flow-col grid-rows-3">
            <div class="bg-blue-500	">A</div>
            <div class="bg-blue-100	">B</div>
            <div class="bg-blue-100	">c</div>
            <div class="bg-blue-100	">d</div>
            <div class="bg-blue-100	">e</div>
            <div class="bg-blue-100	">f</div>
            <div class="bg-blue-100	">g</div>
            <div class="bg-blue-100	">h</div>

        </div>
    </div>
    <br><br>
    <h1>tabla 2 ordena de izquierda derecha y especifica desde donde empezar hay 5 posiciones (1 2 3 4 5)</h1>
    <div class="container">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-3">
            <div class="bg-blue-500	">A</div>
            <div class="bg-blue-100	col-start-1">B</div>
            <div class="bg-blue-100	">c</div>
            <div class="bg-blue-100	">d</div>
            <div class="bg-blue-100	">d</div>
        </div>
    </div>
    <br><br>
    <h1>tabla 3 ordena de izqquierda a derecha con margin left</h1>
    <div class="container">
        <div class="grid grid-cols-2 ">
            <div class="bg-blue-500 ml-0">A</div>
            <div class="bg-blue-100">B</div>
        </div>
    </div>
</x-app-layout>
