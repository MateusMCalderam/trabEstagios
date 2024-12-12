<?php
$estagio = $_SESSION['estagio_vo']; 
$section = $_SESSION['sectionAtual'] ?? 'dados-gerais'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Formulário Estágio</title>
    <style>
        nav ul {
            display: flex;
            list-style: none;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
        }
        nav a.active {
            background-color: #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Estágio</h1>

    <!-- Menu de navegação -->
    <nav>
        <ul>
            <li>
                <a href="../mudaSectionEstagio?section=dados-gerais" 
                   class="<?= $section == 'dados-gerais' ? 'active' : '' ?>">
                   Dados Gerais
                </a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=periodo" 
                   class="<?= $section == 'periodo' ? 'active' : '' ?>">
                   Período
                </a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=atores" 
                   class="<?= $section == 'atores' ? 'active' : '' ?>">
                   Atores
                </a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=representante" 
                   class="<?= $section == 'representante' ? 'active' : '' ?>">
                   Representante
                </a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=documentos" 
                   class="<?= $section == 'documentos' ? 'active' : '' ?>">
                   Documentos
                </a>
            </li>
        </ul>
    </nav>

    <!-- Seções do formulário -->
    <section>
        <?php if ($section == 'dados-gerais'): ?>
            <h2>Dados Gerais</h2>
            <form method="POST" action="./save">
                <label>Área: <input type="text" name="area" value="<?= $estagio->getArea() ?>"></label><br>
                <label>ID Cidade: <input type="text" name="idCidade" value="<?= $estagio->getIdCidade() ?>"></label><br>
                <label>Status: <input type="text" name="status" value="<?= $estagio->getStatus() ?>"></label><br>
                <label>Tipo Processo: <input type="text" name="tipoProcesso" value="<?= $estagio->getTipoProcesso() ?>"></label><br>
                <button type="submit">Salvar</button>
            </form>
        <?php elseif ($section == 'periodo'): ?>
            <h2>Carga Horária e Período</h2>
            <form method="POST" action="./save">
                <label>Carga Horária: <input type="text" name="cargaHoraria" value="<?= $estagio->getCargaHoraria() ?>"></label><br>
                <label>Período: <input type="text" name="periodo" value="<?= $estagio->getPeriodo() ?>"></label><br>
                <button type="submit">Salvar</button>
            </form>
        <?php elseif ($section == 'atores'): ?>
            <h2>Atores</h2>
            <form method="POST" action="./save">
                <label>ID Estudante: <input type="text" name="idEstudante" value="<?= $estagio->getIdEstudante() ?>"></label><br>
                <label>ID Orientador: <input type="text" name="idOrientador" value="<?= $estagio->getIdOrientador() ?>"></label><br>
                <label>ID Empresa: <input type="text" name="idEmpresa" value="<?= $estagio->getIdEmpresa() ?>"></label><br>
                <label>ID Coorientador: <input type="text" name="idCoorientador" value="<?= $estagio->getIdCoorientador() ?>"></label><br>
                <button type="submit">Salvar</button>
            </form>
        <?php elseif ($section == 'representante'): ?>
            <h2>Representante</h2>
            <form method="POST" action="./save">
                <label>Representante: <input type="text" name="representante" value="<?= $estagio->getRepresentante() ?>"></label><br>
                <label>Nome Supervisor: <input type="text" name="nomeSupervisor" value="<?= $estagio->getNomeSupervisor() ?>"></label><br>
                <label>Cargo Supervisor: <input type="text" name="cargoSupervisor" value="<?= $estagio->getCargoSupervisor() ?>"></label><br>
                <label>Telefone Supervisor: <input type="text" name="telefoneSupervisor" value="<?= $estagio->getTelefoneSupervisor() ?>"></label><br>
                <label>Email Supervisor: <input type="email" name="emailSupervisor" value="<?= $estagio->getEmailSupervisor() ?>"></label><br>
                <button type="submit">Salvar</button>
            </form>
            <?php elseif ($section == 'documentos'): ?>
                <h2>Documentos</h2>
                <form method="POST" enctype="multipart/form-data" action="./save">
                    <label>Plano Atividades: <input type="file" name="planoAtividades"></label><br>
                    <label>Relatório Final: <input type="file" name="relatorioFinal"></label><br>
                    <label>Autoavaliação Empresa: <input type="file" name="autoavaliacaoEmpresa"></label><br>
                    <label>Autoavaliação: <input type="file" name="autoavaliacao"></label><br>
                    <label>Termo Compromisso: <input type="file" name="termoCompromisso"></label><br>
                <button type="submit" name="finalizar" value="1">Finalizar</button>
            </form>
        <?php endif; ?>
    </section>
</body>
</html>
