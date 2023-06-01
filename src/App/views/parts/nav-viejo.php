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
<?php endforeach; ?>