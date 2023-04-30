<nav id="menu">
    <ul>
    <?php foreach ($this -> menu as $item) : ?>
        <?php if ($item["name"] == 'Institucional' || $item["name"] == 'Informacion Util'): ?>
            <li class="dropdown"><a href="<?= $item["href"] ?>"><?= $item["name"] ?><span><i id="desplegable1" class="icono-caretDown" aria-hidden="true"></i></span></a>
        <?php else: ?>  
            <li class="dropdown"><a href="<?= $item["href"] ?>"><?= $item["name"] ?></a>
        <?php endif; ?>
        <?php if($item["name"] == "Institucional"): ?>
                <ul class="dropdown-menu sub-menu">
                <?php foreach($this -> subMenuInstitucional as $submenuItem): ?>
                    <li><a href="<?= $submenuItem["href"] ?>"><?= $submenuItem["name"] ?></a></li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>
        <?php if($item["name"] == "Informacion Util"): ?>
                <ul class="dropdown-menu sub-menu">
                <?php foreach($this -> subMenuInformacionUtil as $submenuItem): ?>
                    <li><a href="<?= $submenuItem["href"] ?>"><?= $submenuItem["name"] ?></a></li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
</nav>

    <!--
       <nav id="menu">
            <ul>
                <li class="dropdown">
                    <a href="#">Institucional<span><i id="desplegable1" class="icono-caretDown" aria-hidden="true"></i></span></a>             
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="/institucional/directorio.html">Autoridades</a></li>
                        <li><a href="/institucional/historia.html">Historia</a></li>
                        <li><a href="/institucional/mision.html">Misión</a></li>
                        <li><a href="/institucional/valores.html">Valores</a></li>                
                    </ul>
                </li> 
                <li><a href="/portal-pacientes/login.html">Portal Pacientes</a></li>
                <li><a href="/profyesp.html">Profesionales y Especialidades</a></li>
                <li class="dropdown">
                    <a href="#">Información Útil<span><i id="desplegable2" class="icono-caretDown" aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="/info-util/coberturasmedicas.html">Coberturas médicas</a></li>
                        <li><a href="/info-util/novedades.html">Novedades</a></li>
                        <li><a href="/info-util/patologiasytratamientos.html">Patologías y tratamientos</a></li>
                    </ul>   
                </li>
            </ul>
        </nav>
    -->