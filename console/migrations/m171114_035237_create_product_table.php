<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m171114_035237_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'price' => $this->double(),
            'description' => $this->string(),

        ]);

        $this->createIndex(
            'id',
            'product',
            'category_id'
        );  

        //add foreign key for table `product`
        $this->addForeignKey(
                'fk-product-catergory_id',
                'product',
                'category_id',
                'category',
                'id',
                'CASCADE'
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
