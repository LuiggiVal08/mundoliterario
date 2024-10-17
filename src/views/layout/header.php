<header class="sticky z-50 top-0 bg-[#1b3039] flex justify-between items-center h-[85px] py-1.5 px-[10%]">
    <div class="logo cursor-pointer">
        <img src="/images/Mountain.png" alt="Logo de la marca" class="h-[70px] w-auto transition-all duration-300 hover:scale-110">
    </div>
    <nav>
        <ul class="flex space-x-8 list-none">
            <?php if (isset($_SESSION['user'])) : ?>
                <li class="transform transition duration-300 hover:scale-110">
                    <a href="#" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Puntajes</a>
                </li>
            <?php endif; ?>
            <!-- <li class="transform transition duration-300 hover:scale-110">
                <a href="#" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Evaluacion</a>
            </li> -->
            <li class="transform transition duration-300 hover:scale-110">
                <a href="/" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Inicio</a>
            </li>
            <li class="transform transition duration-300 hover:scale-110">
                <a href="#" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Ayuda</a>
            </li>
            <li class="transform transition duration-300 hover:scale-110">
                <a href="#" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Visión</a>
            </li>
            <li class="transform transition duration-300 hover:scale-110">
                <a href="#" class="font-bold text-[#eceff1] hover:text-[#ffbc0e]">Misión</a>
            </li>
        </ul>
    </nav>
    <div class="flex space-x-4">
        <?php if (!isset($_SESSION['user'])) : ?>
            <a href="/auth" class="btn">
                <button class="font-bold text-[#1b3039] py-2 px-6 bg-[#eceff1] rounded-full transition-all duration-300 ease-in-out hover:bg-[#e2f1f8] hover:text-[#ffbc0e] hover:scale-110">Ingresar</button>
            </a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="#" class="btn">
                <button class="font-bold text-[#1b3039] py-2 px-6 bg-[#eceff1] rounded-full transition-all duration-300 ease-in-out hover:bg-[#e2f1f8] hover:text-[#ffbc0e] hover:scale-110">Salir</button>
            </a>
        <?php endif; ?>
    </div>
</header>
