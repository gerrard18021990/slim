<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Create_table_product extends AbstractMigration
{
    protected function up(): void
    {
        $table = (new \models\Product())->getTable();
        $this->execute("CREATE TABLE {$table} (
                id SERIAL PRIMARY KEY,
                name VARCHAR NOT NULL,
                price DECIMAL(7, 2)
            );"
        );
    }

    protected function down(): void
    {
        $this->table((new \models\Product())->getTable())
            ->drop();
    }
}