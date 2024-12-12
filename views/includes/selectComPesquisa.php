<?php
function renderModalComponent($id, $title, $list, $targetInputId) {
    ?>
    <div id="<?= $id; ?>" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1000;">
        <div class="modal-content" style="background: #fff; margin: 10% auto; padding: 20px; width: 50%; border-radius: 8px; box-shadow: 0 0 10px #333;">
            <h3><?= htmlspecialchars($title); ?></h3>

            <!-- Campo de filtro -->
            <input type="text" id="filterInput-<?= $id; ?>" placeholder="Buscar..." onkeyup="filterList('<?= $id; ?>')" style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <!-- Lista de itens -->
            <ul id="modalList-<?= $id; ?>" style="list-style: none; padding: 0; max-height: 300px; overflow-y: auto; border: 1px solid #ddd;">
                <?php foreach ($list as $item): ?>
                    <li data-value="<?= $item['id']; ?>" onclick="selectItem(this, '<?= $targetInputId; ?>', '<?= $id; ?>')"
                        style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee;">
                        <?= htmlspecialchars($item['label']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Botão para fechar -->
            <button onclick="closeModal('<?= $id; ?>')" style="margin-top: 10px; padding: 8px; cursor: pointer;">Fechar</button>
        </div>
    </div>
    <?php
}
