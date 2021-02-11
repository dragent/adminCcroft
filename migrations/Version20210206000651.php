<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206000651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vip (id INT AUTO_INCREMENT NOT NULL, pseudo_vip VARCHAR(255) NOT NULL, super_vip INT NOT NULL, dateof_vip DATE NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE vips');
        $this->addSql('ALTER TABLE moderateur ADD id_moderateur VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD pseudo_moderateur VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, DROP idModerateur, DROP pseudoModerateur, DROP mail, CHANGE supermodo super_modo TINYINT(1) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_moderateur)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vips (idVip INT AUTO_INCREMENT NOT NULL, pseudoVips VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, superVip INT NOT NULL, dateofVip DATE NOT NULL, duree INT NOT NULL, PRIMARY KEY(idVip)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE vip');
        $this->addSql('ALTER TABLE `Moderateur` MODIFY id_moderateur VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE `Moderateur` DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE `Moderateur` ADD idModerateur INT AUTO_INCREMENT NOT NULL, ADD pseudoModerateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ADD mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, DROP id_moderateur, DROP roles, DROP pseudo_moderateur, DROP email, CHANGE super_modo superModo TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE `Moderateur` ADD PRIMARY KEY (idModerateur)');
    }
}
