<?php
/**
 * Resolve modResource.description column
 *
 * @package seopro
 * @subpackage build
 *
 * @var xPDOTransport $transport
 * @var modX $modx
 * @var array $options
 */

if ($transport->xpdo) {
    $modx =& $transport->xpdo;
    $version = $modx->getVersionData();
    $version = (int)($version['version'] . $version['major_version']);

    if ($version < 27) {
        $table = $modx->getTableName('modResource');
        switch ($options[xPDOTransport::PACKAGE_ACTION]) {
            case xPDOTransport::ACTION_INSTALL:
            case xPDOTransport::ACTION_UPGRADE:
                $c = $modx->prepare("SHOW COLUMNS IN {$table} WHERE Field = 'description';");
                if ($c->execute() && $data = $c->fetch(PDO::FETCH_ASSOC)) {
                    if (stripos($data['Type'], 'varchar') === 0) {
                        $c = $modx->prepare("ALTER TABLE {$table} CHANGE `description` `description` TEXT;");
                        $c->execute();
                    }
                }
                break;

            case xPDOTransport::ACTION_UNINSTALL:
                $c = $modx->prepare("SHOW COLUMNS IN {$table} WHERE Field = 'description';");
                if ($c->execute() && $data = $c->fetch(PDO::FETCH_ASSOC)) {
                    if ($data['Type'] == 'text') {
                        $modx->prepare("ALTER TABLE {$table} CHANGE `description` `description` VARCHAR(191);")
                            ->execute();
                    }
                }
                break;
        }
    }
}

return true;