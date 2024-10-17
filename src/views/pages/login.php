<!-- <script src="/js/login.js"></script> -->
<div class="backdrop-blur-sm flex items-center justify-center w-full h-full p-4 min-h-[calc(100vh-70px)] ">
    <div x-data="{ show :  true }" class="relative w-fit md:w-full  m-auto max-w-[720px] ">
        <!-- {/* box-before */} -->
        <div class="mx-auto w-[calc(100%-15px)] bg-gray-800/80 dark:bg-neutral-950/70 backdrop-blur-sm  px-4 md:w-full h-full py-3 flex justify-evenly items-center flex-col md:flex-row ">
            <div class="my-10 mx-3 flex items-start min-h-[240px] flex-col justify-between  text-white duration-300 max-w-[294px] w-full "
                :class=" show? 'opacity-0 ' :'' "
                x-cloak>
                <h3 class="text-5xl font-sketchup ">
                    Ya tienes una cuenta?
                </h3>
                <p class="text-paragraph font-normal">
                    Inicia sesión para poder acceder y realizar
                    tus solicitudes
                </p>
                <button
                    @click="show = true"
                    class="uppercase dark:bg-transparent hover:dark:bg-tertiary-100 hover:bg-tertiary-100 bg-transparent border-2 text-white py-3 px-6 rounded-md">
                    Iniciar Sesión
                </button>
            </div>
            <div class="my-10 mx-3 flex items-start min-h-[240px] flex-col justify-between  text-white duration-300 max-w-[294px] w-full "
                :class=" !show? 'opacity-0 ' :'' "
                x-cloak>
                <h3 class="text-5xl font-sketchup ">
                    Aun no tienes cuenta?
                </h3>
                <p class="text-paragraph font-normal">
                    Registrate para que puedas disfrutar de más
                    funsionalidades
                </p>
                <button
                    @click="show = false"
                    class="uppercase dark:bg-transparent hover:dark:bg-tertiary-100 hover:bg-tertiary-100 bg-transparent border-2 text-white py-3 px-6 rounded-md">
                    Registrarse
                </button>
            </div>
        </div>
        <!-- {/* content forms */} -->
        <div
            class="relative md:absolute h-full w-full transition-form max-w-[360px] top-[calc(50%-172px)] flex items-center"
            :class="show? 'md:left-2': ' md:left-[calc(100%-368px)]'">
            <!-- Card__form singup-->
            <div class="rounded-md max-w-[420px] py-[30px] duration-300 ease w-full bg-white max-sm:w-min min-h-[430px] items-center flex p-6"
                :class="show ? 'hidden' : ''">
                <form id="formRegister" class="space-y-8 w-full">
                    <h3 class="text-5xl font-sketchup w-full text-text-primary text-center">
                        Registrarse
                    </h3>
                    <div class="space-y-4">
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="text" name="name" data-valid="name">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Nombre
                            </span>
                        </label>
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="text" name="lastname" data-valid="name">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Apellido
                            </span>
                        </label>
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="text" name="username" data-valid="username">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Nombre de Usuario
                            </span>
                        </label>
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="password" name="password" data-valid="password">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Contraseña
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="w-full group relative flex items-stretch justify-center p-0.5 text-center font-medium transition-[color,background-color,border-color,text-decoration-color,fill,stroke,box-shadow] focus:z-10 focus:outline-none border border-transparent bg-blue-600 text-white focus:ring-4 focus:ring-blue-300 enabled:hover:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800 rounded-lg">
                        <span class="flex items-stretch transition-all duration-200 rounded-md px-4 py-2 text-sm">Registrarse</span>
                    </button>
                </form>
            </div>
            <!-- Card__form login-->
            <div class="rounded-md max-w-[420px] py-[30px] duration-300 ease w-full bg-white max-sm:w-min min-h-[400px] items-center flex p-6"
                :class="!show ? 'hidden' : ''">
                <form id="formLogin" class="space-y-8 w-full">
                    <h3 class="text-5xl font-sketchup w-full text-text-primary text-center">
                        Iniciar Seción
                    </h3>
                    <div class="space-y-5">
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="text" name="username" data-valid="username">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Nombre de Usuario
                            </span>
                        </label>
                        <label class="relative flex flex-col w-full">
                            <input required class="peer border border-gray-400 dark:border-gray-700 h-[42px] w-full px-4 py-2 rounded-md outline-none text-text-primary" type="password" name="password" data-valid="password">
                            <span
                                class="bg-white px-1 absolute  left-3 text-text-secondary text-low transition-all font-light translate-y-[10px]
                                peer-focus:-translate-y-[10px] peer-focus:-translate-x-[5px] peer-focus:scale-90 peer-focus:text-text-primary peer-focus:font-bold
                                peer-valid:-translate-y-[10px] peer-valid:-translate-x-[5px] peer-valid:scale-90 peer-valid:text-text-primary peer-valid:font-bold">
                                Contraseña
                            </span>
                        </label>
                    </div>
                    <div class="">
                        <button type="submit" class="w-full group relative flex items-stretch justify-center p-0.5 text-center font-medium transition-[color,background-color,border-color,text-decoration-color,fill,stroke,box-shadow] focus:z-10 focus:outline-none border border-transparent bg-blue-600 text-white focus:ring-4 focus:ring-blue-300 enabled:hover:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800 rounded-lg">
                            <span class="flex items-stretch transition-all duration-200 rounded-md px-4 py-2 text-sm">INGRESAR</span>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/login.js" type="module"></script>
