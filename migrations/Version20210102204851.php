<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210102204851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE debt_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payment_commission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payment_status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE debt (id INT NOT NULL, company_id INT NOT NULL, file_id INT DEFAULT NULL, business_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, province VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, cuit BIGINT NOT NULL, cbu VARCHAR(255) NOT NULL, amount NUMERIC(12, 2) NOT NULL, core_debt_id INT DEFAULT NULL, reference_id VARCHAR(255) NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DBBF0A83979B1AD6 ON debt (company_id)');
        $this->addSql('CREATE INDEX IDX_DBBF0A8393CB796C ON debt (file_id)');
        $this->addSql('CREATE TABLE file (id INT NOT NULL, full_name VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, file_system_identifier VARCHAR(255) NOT NULL, generation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, upload_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, total_records INT NOT NULL, total_amount NUMERIC(12, 2) NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE payment (id INT NOT NULL, debt_id INT NOT NULL, payment_status_id INT NOT NULL, company_id INT NOT NULL, payment_commission_id INT DEFAULT NULL, external_id INT NOT NULL, payment_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, amount NUMERIC(12, 2) NOT NULL, process_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6D28840D240326A5 ON payment (debt_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D28DE2F95 ON payment (payment_status_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D979B1AD6 ON payment (company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D28840DDD29177F ON payment (payment_commission_id)');
        $this->addSql('CREATE TABLE payment_commission (id INT NOT NULL, payment_id INT NOT NULL, fixed_commission NUMERIC(12, 2) DEFAULT NULL, variable_commission NUMERIC(12, 2) DEFAULT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2993808D4C3A3BB ON payment_commission (payment_id)');
        $this->addSql('CREATE TABLE payment_status (id INT NOT NULL, name VARCHAR(255) NOT NULL, display_name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE debt ADD CONSTRAINT FK_DBBF0A83979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE debt ADD CONSTRAINT FK_DBBF0A8393CB796C FOREIGN KEY (file_id) REFERENCES file (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D240326A5 FOREIGN KEY (debt_id) REFERENCES debt (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D28DE2F95 FOREIGN KEY (payment_status_id) REFERENCES payment_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DDD29177F FOREIGN KEY (payment_commission_id) REFERENCES payment_commission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment_commission ADD CONSTRAINT FK_2993808D4C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE payment DROP CONSTRAINT FK_6D28840D240326A5');
        $this->addSql('ALTER TABLE debt DROP CONSTRAINT FK_DBBF0A8393CB796C');
        $this->addSql('ALTER TABLE payment_commission DROP CONSTRAINT FK_2993808D4C3A3BB');
        $this->addSql('ALTER TABLE payment DROP CONSTRAINT FK_6D28840DDD29177F');
        $this->addSql('ALTER TABLE payment DROP CONSTRAINT FK_6D28840D28DE2F95');
        $this->addSql('DROP SEQUENCE debt_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payment_commission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payment_status_id_seq CASCADE');
        $this->addSql('DROP TABLE debt');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE payment_commission');
        $this->addSql('DROP TABLE payment_status');
    }
}
